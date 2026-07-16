<?php

namespace App\Http\Controllers\Admin\LMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\LMS\StoreCourseSlotRequest;
use App\Http\Requests\LMS\UpdateCourseSlotRequest;
use App\Models\Course;
use App\Models\LMS\CourseSlot;
use App\Models\LMS\SlotTeacher;
use App\Models\TrainingCenter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class CourseSlotController extends Controller
{
    private function normalizeNullableFields(array $data): array
    {
        foreach (['title', 'booking_open_at', 'booking_close_at', 'notes'] as $field) {
            if (array_key_exists($field, $data) && $data[$field] === '') {
                $data[$field] = null;
            }
        }

        return $data;
    }

    public function index(Request $request)
    {
        $request->user()->can('course-slot.list') || abort(403);

        

        try {
            $query = CourseSlot::query()->with([
                'course',
                'trainingCenter',
                'users.user',
            ]);

            if ($request->filled('search')) {
                $search = trim($request->search);

                $query->where(function ($builder) use ($search) {
                    $builder->where('title', 'like', "%{$search}%")
                        ->orWhere('training_date', 'like', "%{$search}%")
                        ->orWhereHas('course', function ($courseQuery) use ($search) {
                            $courseQuery->where('name', 'like', "%{$search}%");
                        })
                        ->orWhereHas('trainingCenter', function ($centerQuery) use ($search) {
                            $centerQuery->where('name', 'like', "%{$search}%");
                        });
                });
            }

            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            $slots = $query
                ->latest()
                ->paginate($request->integer('per_page', 15))
                ->withQueryString();

            return view('backend.pages.LMS.course-slot.index', compact('slots'));
        } catch (Throwable $e) {
            report($e);

            return back()->with('error', 'Unable to load course slots.');
        }
    }

    public function create(Request $request)
    {
        $request->user()->can('course-slot.create') || abort(403);

        return view('backend.pages.LMS.course-slot.create', [
            'courses' => Course::orderBy('name')->get(),
            'trainingCenters' => TrainingCenter::orderBy('name')->get(),
            'teachers' => User::orderBy('name')->get(),
        ]);
    }

    public function store(StoreCourseSlotRequest $request)
    {
        $request->user()->can('course-slot.create') || abort(403);

        DB::beginTransaction();

        try {
            $data = $this->normalizeNullableFields($request->validated());
            $teacherIds = $data['teacher_ids'] ?? [];

            unset($data['teacher_ids']);

            $data['uuid'] = (string) Str::uuid();
            $data['available_seats'] = $data['capacity'];
            $data['status'] = $data['status'] ?? 'active';
            $data['booking_open_at'] = $data['booking_open_at'] ?? null;
            $data['booking_close_at'] = $data['booking_close_at'] ?? null;

            $slot = CourseSlot::create($data);

            foreach ($teacherIds as $teacherId) {
                SlotTeacher::create([
                    'course_slot_id' => $slot->id,
                    'user_id' => $teacherId,
                ]);
            }

            DB::commit();

            return redirect()
                ->to(role_route('role.course-slots.index'))
                ->with('success', 'Course slot created successfully.');
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Failed to create course slot.');
        }
    }

    public function show(Request $request, string $role, CourseSlot $course_slot)
    {
        $request->user()->can('course-slot.view') || abort(403);

        $course_slot->load([
            'course',
            'trainingCenter',
            'users.user',
        ]);

        return view('backend.pages.LMS.course-slot.show', [
            'courseSlot' => $course_slot,
        ]);
    }

    public function edit(Request $request, string $role, CourseSlot $course_slot)
    {
        $request->user()->can('course-slot.edit') || abort(403);

        $course_slot->load('users.user');

        return view('backend.pages.LMS.course-slot.edit', [
            'slot' => $course_slot,
            'courses' => Course::orderBy('name')->get(),
            'trainingCenters' => TrainingCenter::orderBy('name')->get(),
            'teachers' => User::orderBy('name')->get(),
        ]);
    }

    public function update(UpdateCourseSlotRequest $request, string $role, CourseSlot $course_slot)
    {
        $request->user()->can('course-slot.edit') || abort(403);

        DB::beginTransaction();

        try {
            $data = $this->normalizeNullableFields($request->validated());
            $teacherIds = $data['teacher_ids'] ?? null;

            unset($data['teacher_ids']);

            if (
                array_key_exists('capacity', $data)
                && (int) $data['capacity'] !== (int) $course_slot->capacity
            ) {
                $bookedSeats = $course_slot->capacity - $course_slot->available_seats;
                $data['available_seats'] = max(0, (int) $data['capacity'] - $bookedSeats);
            }

            $course_slot->fill(collect($data)->filter(
                fn ($value) => $value !== ''
            )->toArray());

            if ($course_slot->isDirty()) {
                $course_slot->save();
            }

            if (is_array($teacherIds)) {
                $currentTeacherIds = $course_slot->users()
                    ->pluck('user_id')
                    ->map(fn ($value) => (int) $value)
                    ->sort()
                    ->values()
                    ->all();

                $normalizedTeacherIds = collect($teacherIds)
                    ->map(fn ($value) => (int) $value)
                    ->sort()
                    ->values()
                    ->all();

                if ($currentTeacherIds !== $normalizedTeacherIds) {
                    $course_slot->users()->delete();

                    foreach ($normalizedTeacherIds as $teacherId) {
                        SlotTeacher::create([
                            'course_slot_id' => $course_slot->id,
                            'user_id' => $teacherId,
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()
                ->to(role_route('role.course-slots.index'))
                ->with('success', 'Course slot updated successfully.');
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Failed to update course slot.');
        }
    }

    public function destroy(Request $request, string $role, CourseSlot $course_slot)
    {
        $request->user()->can('course-slot.delete') || abort(403);

        DB::beginTransaction();

        try {
            $course_slot->delete();

            DB::commit();

            return redirect()
                ->to(role_route('role.course-slots.index'))
                ->with('success', 'Course slot deleted successfully.');
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()->with('error', 'Failed to delete course slot.');
        }
    }
}

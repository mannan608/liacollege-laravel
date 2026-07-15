<?php

namespace App\Http\Controllers\Admin\LMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\LMS\StoreCourseSlotRequest;
use App\Http\Requests\LMS\UpdateCourseSlotRequest;
use App\Models\Course;
use App\Models\LMS\CourseSlot;
use App\Models\TrainingCenter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseSlotController extends Controller
{
 public function index(Request $request)
    {
        $slots = CourseSlot::with([
                'course',
                'trainingCenter',
                'users.user'
            ])
            ->latest()
            ->paginate(15);

        return view('admin.course-slots.index', compact('slots'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.course-slots.create', [

            'courses' => Course::orderBy('title')->get(),

            'trainingCenters' => TrainingCenter::orderBy('name')->get(),

            'users' => User::orderBy('name')->get(),

        ]);
    }

    /**
     * Store new slot.
     */
    public function store(StoreCourseSlotRequest $request)
    {
        DB::transaction(function () use ($request) {

            $data = $request->validated();

            $data['uuid'] = Str::uuid();

            $data['available_seats'] = $data['capacity'];

            $slot = CourseSlot::create($data);

            if (!empty($data['user_ids'])) {

                foreach ($data['user_ids'] as $userId) {

                    $slot->users()->create([
                        'user_id' => $userId,
                    ]);
                }
            }
        });

        return redirect()
            ->route('admin.course-slots.index')
            ->with('success', 'Course Slot Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseSlot $courseSlot)
    {
        $courseSlot->load([
            'course',
            'trainingCenter',
            'users.user'
        ]);

        return view('admin.course-slots.show', compact('courseSlot'));
    }

    /**
     * Show edit form.
     */
    public function edit(CourseSlot $courseSlot)
    {
        return view('admin.course-slots.edit', [

            'slot' => $courseSlot->load('users'),

            'courses' => Course::orderBy('title')->get(),

            'trainingCenters' => TrainingCenter::orderBy('name')->get(),

            'users' => User::orderBy('name')->get(),

        ]);
    }

    /**
     * Update the specified resource.
     */
    public function update(
        UpdateCourseSlotRequest $request,
        CourseSlot $courseSlot
    ) {
        DB::transaction(function () use ($request, $courseSlot) {

            $data = $request->validated();

            /*
            |--------------------------------------------------------------------------
            | Update only changed fields
            |--------------------------------------------------------------------------
            */

            $courseSlot->fill($data);

            /*
            |--------------------------------------------------------------------------
            | Capacity Changed?
            |--------------------------------------------------------------------------
            */

            if (
                isset($data['capacity']) &&
                $courseSlot->capacity != $data['capacity']
            ) {

                $bookedSeats = $courseSlot->capacity - $courseSlot->available_seats;

                $courseSlot->available_seats = max(
                    0,
                    $data['capacity'] - $bookedSeats
                );
            }

            if ($courseSlot->isDirty()) {

                $courseSlot->save();
            }

            /*
            |--------------------------------------------------------------------------
            | Assigned Users
            |--------------------------------------------------------------------------
            */

            if (isset($data['user_ids'])) {

                $courseSlot->users()->delete();

                foreach ($data['user_ids'] as $userId) {

                    $courseSlot->users()->create([
                        'user_id' => $userId,
                    ]);
                }
            }

        });

        return redirect()
            ->route('admin.course-slots.index')
            ->with('success', 'Course Slot Updated Successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(CourseSlot $courseSlot)
    {
        $courseSlot->delete();

        return redirect()
            ->route('admin.course-slots.index')
            ->with('success', 'Course Slot Deleted Successfully.');
    }
}
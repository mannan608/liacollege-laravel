<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TrainingCenter;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTrainingCenterRequest;
use App\Http\Requests\UpdateTrainingCenterRequest;

class TrainingCenterController extends Controller
{
    private function findTrainingCenter(string $identifier): TrainingCenter
    {
        return TrainingCenter::query()
            ->where('uuid', $identifier)
            ->orWhere('id', $identifier)
            ->firstOrFail();
    }

    /**
     * List Training Centers
     */
    public function index(Request $request)
    {
        $request->user()->can('training-centers.list') || abort(403);
        try {
            $query = TrainingCenter::query();

            if ($request->filled('search')) {
                $search = trim($request->search);

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('city', 'like', "%{$search}%")
                        ->orWhere('state', 'like', "%{$search}%")
                        ->orWhere('country', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            }

            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            $trainingCenters = $query
                ->latest()
                ->paginate($request->integer('per_page', 15))
                ->withQueryString();

            return view('backend.pages.training-centers.index', compact('trainingCenters'));
        } catch (Throwable $e) {
            report($e);

            return back()->with(
                'error',
                'Unable to load training centers.'
            );
        }
    }

    /**
     * Create Form
     */
    public function create(Request $request)
    {
        $request->user()->can('training-centers.create') || abort(403);

        return view('backend.pages.training-centers.create');
    }

    /**
     * Store
     */
    public function store(StoreTrainingCenterRequest $request)
    {
        $request->user()->can('training-centers.create') || abort(403);

        DB::beginTransaction();

        try {
            TrainingCenter::create([
                'uuid' => Str::uuid(),
                ...$request->validated(),
                'status' => $request->boolean('status', true),
            ]);

            DB::commit();
            return redirect(role_route('role.training-centers.index'))
                ->with('success', 'Training center created successfully.');
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Failed to create training center.');
        }
    }

    /**
     * Show Details
     */
    public function show(Request $request, string $role, string $training_center)
    {
        $request->user()->can('training-centers.view') || abort(403);

        try {
            $trainingCenter = $this->findTrainingCenter($training_center);

            return view(
                'backend.pages.training-centers.show',
                compact('trainingCenter')
            );
        } catch (Throwable $e) {
            report($e);

            return redirect()
                ->route('role.training-centers.index')
                ->with('error', 'Training center not found.');
        }
    }

    /**
     * Edit Form
     */
    public function edit(Request $request, string $role, string $training_center)
    {
        $request->user()->can('training-centers.edit') || abort(403);

        $trainingCenter = $this->findTrainingCenter($training_center);

        return view(
            'backend.pages.training-centers.edit',
            ['trainingCenter' => $trainingCenter]
        );
    }

    /**
     * Update
     */
    public function update(
        UpdateTrainingCenterRequest $request,
        string $role,
        string $training_center
    ) {
        $request->user()->can('training-centers.edit') || abort(403);

        DB::beginTransaction();

        try {
            $trainingCenter = $this->findTrainingCenter($training_center);

            $data = collect($request->validated())
                ->filter(fn($value) => $value !== '')
                ->toArray();

            $trainingCenter->fill($data);

            if ($trainingCenter->isDirty()) {
                $trainingCenter->save();
            }

            DB::commit();

            return redirect(role_route('role.training-centers.index'))
                ->with('success', 'Training center updated successfully.');
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Failed to update training center.');
        }
    }

    /**
     * Delete
     */
    public function destroy(Request $request, string $role, string $training_center)
    {
        $request->user()->can('training-centers.delete') || abort(403);

        DB::beginTransaction();

        try {
            $trainingCenter = $this->findTrainingCenter($training_center);

            $trainingCenter->delete();

            DB::commit();

            return redirect()
                ->route('role.training-centers.index')
                ->with('success', 'Training center deleted successfully.');
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->with('error', 'Failed to delete training center.');
        }
    }
}

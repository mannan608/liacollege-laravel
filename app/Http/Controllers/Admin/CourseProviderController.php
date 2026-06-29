<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderStoreRequest;
use App\Http\Requests\ProviderUpdateRequest;
use App\Models\CourseProvider;
use App\Repositories\Interfaces\ProviderRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseProviderController extends Controller
{
    public function __construct(
        private readonly ProviderRepositoryInterface $providers
    ) {}

    public function index(Request $request): View
    {
        $request->user()->can('provider.list') || abort(403);

        return view('backend.pages.providers.index', [
            'providers' => $this->providers->paginate(),
            'title' => 'Providers',
        ]);
    }

    public function create(Request $request): View
    {
        $request->user()->can('provider.create') || abort(403);

        return view('backend.pages.providers.create', [
            'provider' => null,
            'title' => 'Create Provider',
        ]);
    }

    public function store(ProviderStoreRequest $request): RedirectResponse
    {
        $this->providers->create($request->validated());

        return redirect()
            ->route('role.providers.index', [
                'role' => $request->route('role')
            ])
            ->with('success', 'Provider created successfully.');
    }

    public function show(
        Request $request,
        CourseProvider $provider
    ): View {
        $request->user()->can('provider.view') || abort(403);

        return view('backend.pages.providers.show', [
            'provider' => $provider,
            'title' => 'Provider Details',
        ]);
    }

public function edit(
    Request $request,
    string $role,
    CourseProvider $provider
): View {
        $request->user()->can('provider.edit') || abort(403);

        return view('backend.pages.providers.edit', [
            'provider' => $provider,
            'title' => 'Edit Provider',
        ]);
    }

    public function update(
        ProviderUpdateRequest $request,
        CourseProvider $provider
    ): RedirectResponse {
        $this->providers->update($provider, $request->validated());

        return redirect()
            ->route('role.providers.index', [
                'role' => $request->route('role')
            ])
            ->with('success', 'Provider updated successfully.');
    }

    public function destroy(
        Request $request,
        string $role,
        CourseProvider $provider
    ): RedirectResponse {
        $request->user()->can('provider.delete') || abort(403);

        $this->providers->delete($provider);

        return redirect()
            ->route('role.providers.index', [
                'role' => $role
            ])
            ->with('success', 'Provider deleted successfully.');
    }
}
@php
    $items = $items ?? collect();
  
@endphp

<div class="overflow-hidden rounded-lg border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Course</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Slot</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Schedule</th>
                    <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wide text-gray-500">Course Permission</th>                    
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @forelse ($items as $enrollment)
                    <tr class="align-top">                      
                        <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">
                            {{ $enrollment->slot?->course?->name ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">
                            {{ $enrollment->slot?->title ?? 'Slot #' . $enrollment->course_slot_id }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400">
                            <div>{{ optional($enrollment->slot?->training_date)->format('d M Y') ?? 'N/A' }}</div>
                            <div>{{ $enrollment->slot?->start_time }} - {{ $enrollment->slot?->end_time }}</div>
                            <div>{{ $enrollment->slot?->trainingCenter?->name }}</div>
                        </td>                       
                       
                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400">
                            @if ($enrollment->student && $enrollment->slot?->course)
                                <form method="POST"
                                    action="{{ role_route('role.enrollments.update', ['enrollment' => $enrollment]) }}"
                                    class="space-y-2 flex items-center justify-end">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="status" value="{{ $enrollment->status }}">

                                    <select name="course_permission_role_id"
                                        onchange="this.form.submit()"
                                        class="min-w-48 rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-brand-500 focus:outline-none dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200">
                                        <option value="">No role assigned</option>
                                        @foreach ($enrollment->slot->course->permissionRoles as $permissionRole)
                                            <option value="{{ $permissionRole->id }}"
                                                @selected((int) $enrollment->course_permission_role_id === (int) $permissionRole->id)>
                                                {{ $permissionRole->name }}{{ $permissionRole->is_full_access ? ' - Full Access' : '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            @else
                                <span class="text-xs text-gray-400">No course</span>
                            @endif
                        </td>                      
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-12 text-center text-sm text-gray-500">
                            No enrollments found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

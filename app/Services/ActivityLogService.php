<?php

namespace App\Services;

use App\Models\ActivityLog;
use Jenssegers\Agent\Agent;

class ActivityLogService
{
    public static function log(
        string $action,
        string $module,
        string $description = '',
        $recordId = null,
        $recordType = null,
        array $oldValues = [],
        array $newValues = [],
        string $status = 'success'
    )
    {
        $agent = new Agent();

        ActivityLog::create([

            'user_id' => auth()->id(),

            'user_name' => auth()->user()->name ?? null,

            'action' => $action,

            'module' => $module,

            'record_id' => $recordId,

            'record_type' => $recordType,

            'description' => $description,

            'old_values' => !empty($oldValues)
                ? $oldValues
                : null,

            'new_values' => !empty($newValues)
                ? $newValues
                : null,

            'url' => request()->fullUrl(),

            'method' => request()->method(),

            'ip_address' => request()->ip(),

            'user_agent' => request()->userAgent(),

            'browser' => $agent->browser(),

            'platform' => $agent->platform(),

            'device_type' => $agent->isMobile()
                ? 'Mobile'
                : ($agent->isTablet()
                    ? 'Tablet'
                    : 'Desktop'),

            'status' => $status
        ]);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    const TYPE_ENROLMENT = 'Enrolment Documents';
    const TYPE_CONFIRMATION = 'Confirmation Letter';
    const TYPE_SIGNED_TERMS = 'Signed Terms';
    const TYPE_TRANSCRIPT = 'Academic Transcript';
    const TYPE_CERTIFICATE = 'Certificate';

    public static function getTypes(): array
    {
        return [
            self::TYPE_ENROLMENT,
            self::TYPE_CONFIRMATION,
            self::TYPE_SIGNED_TERMS,
            self::TYPE_TRANSCRIPT,
            self::TYPE_CERTIFICATE,
        ];
    }

    protected $fillable = [
        'name',
        'file',
        'extension',
        'size',
        'document_type',
        'notes',
        'uploaded_by',
    ];

    public function documentable()
    {
        return $this->morphTo();
    }

    public function uploadedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function getFormattedSizeAttribute(): string
    {
        $bytes = $this->size;
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        }
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }
        return $bytes . ' bytes';
    }

    public function isImage(): bool
    {
        return in_array(strtolower($this->extension), ['jpg', 'jpeg', 'png']);
    }

    public function isPdf(): bool
    {
        return strtolower($this->extension) === 'pdf';
    }
}
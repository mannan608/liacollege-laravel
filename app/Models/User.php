<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\CourseResources\CoursePermissions;
use App\Models\LMS\SlotTeacher;
use App\Models\QuizModels\Quiz;
use App\Models\QuizModels\QuizAttempt;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'avatar',
        'password',
        'status',
        'primary_role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function primaryRole(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'primary_role_id');
    }

    public function isActive(): bool
    {
        return $this->status === config('rbac.active_status', 'active');
    }

    public function primaryRoleName(): ?string
    {
        return user_primary_role($this);
    }

    public function rolePrefix(): ?string
    {
        return user_role_prefix($this);
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    public function isStudent()
    {
        return $this->student()->exists();
    }

    public function coursePermissions(): HasManyThrough
    {
        return $this->hasManyThrough(
            CoursePermissions::class,
            Student::class,
            'user_id',
            'student_id',
            'id',
            'id',
        );
    }

    public function teachingSlots()
    {
        return $this->hasMany(SlotTeacher::class, 'user_id');
    }
    public function documents()
{
    return $this->morphMany(Document::class, 'documentable');
}

public function quizzesCreated()
{
    return $this->hasMany(Quiz::class, 'user_id');
}

public function quizAttempts()
{
    return $this->hasMany(QuizAttempt::class);
}

public function hasCompletedQuiz(Quiz $quiz): bool
{
    return $this->quizAttempts()
        ->where('quiz_id', $quiz->id)
        ->where('status', 'completed')
        ->exists();
}

}


<?php
namespace App\Services;

use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseSectionRow;
use App\Models\User;
class CoursePermissionService
{
    public function canAccessCourse(User $student, Course $course): bool
    {
        return $student->coursePermissions()
            ->where('course_id', $course->id)
            ->exists();
    }

    public function canAccessSection(User $student, CourseSection $section): bool
    {
        // Full Course
        if (
            $student->coursePermissions()
                ->where('course_id', $section->course_id)
                ->whereNull('section_id')
                ->whereNull('row_id')
                ->exists()
        ) {
            return true;
        }

        // Full Section
        return $student->coursePermissions()
            ->where('section_id', $section->id)
            ->whereNull('row_id')
            ->exists();
    }

    public function canAccessRow(User $student, CourseSectionRow $row): bool
    {
        $section = $row->section;

        // Full Course
        if ($this->canAccessCourse($student, $section->course)) {
            return true;
        }

        // Full Section
        if ($this->canAccessSection($student, $section)) {
            return true;
        }

        // Individual Row
        return $student->coursePermissions()
            ->where('row_id', $row->id)
            ->exists();
    }
}
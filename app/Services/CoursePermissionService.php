<?php

namespace App\Services;

use App\Models\CoursePermissions;
use App\Models\CourseSectionRow;
use App\Models\Student;

class CoursePermissionService
{
    public function canAccessRow(Student $student, CourseSectionRow $row): bool
    {
        $courseId = $row->section->course_id;
        $sectionId = $row->course_section_id;

        // Full Course
        if (
            CoursePermissions::where([
                'student_id' => $student->id,
                'course_id' => $courseId,
            ])
            ->whereNull('section_id')
            ->whereNull('row_id')
            ->exists()
        ) {
            return true;
        }

        // Full Section
        if (
            CoursePermissions::where([
                'student_id' => $student->id,
                'course_id' => $courseId,
                'section_id' => $sectionId,
            ])
            ->whereNull('row_id')
            ->exists()
        ) {
            return true;
        }

        // Individual Row
        return CoursePermissions::where([
            'student_id' => $student->id,
            'course_id' => $courseId,
            'section_id' => $sectionId,
            'row_id' => $row->id,
        ])->exists();
    }
}
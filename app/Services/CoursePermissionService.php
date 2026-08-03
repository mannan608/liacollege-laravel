<?php

namespace App\Services;

use App\Models\Course;
use App\Models\CourseResources\CoursePermissionRole;
use App\Models\CourseResources\CourseSection;
use App\Models\CourseResources\CourseSectionRow;
use App\Models\CourseContentCategory;
use App\Models\LMS\Enrollment;
use App\Models\Student;
use Illuminate\Support\Collection;

class CoursePermissionService
{
    public function getEnrollmentForCourse(Student $student, Course $course): ?Enrollment
    {
        return $student->enrollments()
            ->whereHas('slot', function ($query) use ($course) {
                $query->where('course_id', $course->id);
            })
            ->with('permissionRole.permissions')
            ->latest('created_at')
            ->first();
    }

    public function getRoleForStudentCourse(Student $student, Course $course): ?CoursePermissionRole
    {
        return $this->getEnrollmentForCourse($student, $course)?->permissionRole;
    }

    public function canAccessCourse(Student $student, Course $course): bool
    {
        return (bool) $this->getRoleForStudentCourse($student, $course);
    }

    public function canAccessCategory(Student $student, CourseContentCategory $category): bool
    {
        $role = $this->getRoleForStudentCourse($student, $category->course);

        return $role ? $this->canAccessCategoryWithRole($role, $category) : false;
    }

    public function canAccessSection(Student $student, CourseSection $section): bool
    {
        $section->loadMissing('category.course');
        $role = $this->getRoleForStudentCourse($student, $section->category->course);

        return $role ? $this->canAccessSectionWithRole($role, $section) : false;
    }

    public function canAccessRow(Student $student, CourseSectionRow $row): bool
    {
        $row->loadMissing('section.category.course');
        $role = $this->getRoleForStudentCourse($student, $row->section->category->course);

        return $role ? $this->canAccessRowWithRole($role, $row) : false;
    }

    public function canDownloadRow(Student $student, CourseSectionRow $row): bool
    {
        return $row->is_downloadable && $this->canAccessRow($student, $row);
    }

    public function canSubmitRow(Student $student, CourseSectionRow $row): bool
    {
        return $row->is_document_submission && $this->canAccessRow($student, $row);
    }

    public function canAccessCategoryWithRole(CoursePermissionRole $role, CourseContentCategory $category): bool
    {
        if ($role->isFullAccess()) {
            return true;
        }

        $allowedCategories = $this->rolePermissionIds($role, CourseContentCategory::class);
        $allowedSections = $this->rolePermissionIds($role, CourseSection::class);
        $allowedRows = $this->rolePermissionIds($role, CourseSectionRow::class);

        if (in_array($category->id, $allowedCategories, true)) {
            return true;
        }

        $category->loadMissing('sections.rows');

        return $category->sections->contains(function (CourseSection $section) use ($allowedSections, $allowedRows) {
            if (in_array($section->id, $allowedSections, true)) {
                return true;
            }

            return $section->rows->contains(fn (CourseSectionRow $row) => in_array($row->id, $allowedRows, true));
        });
    }

    public function canAccessSectionWithRole(CoursePermissionRole $role, CourseSection $section): bool
    {
        if ($role->isFullAccess()) {
            return true;
        }

        $allowedCategories = $this->rolePermissionIds($role, CourseContentCategory::class);
        $allowedSections = $this->rolePermissionIds($role, CourseSection::class);
        $allowedRows = $this->rolePermissionIds($role, CourseSectionRow::class);

        $section->loadMissing('category');

        if (in_array($section->category?->id, $allowedCategories, true)) {
            return true;
        }

        if (in_array($section->id, $allowedSections, true)) {
            return true;
        }

        $section->loadMissing('rows');

        return $section->rows->contains(fn (CourseSectionRow $row) => in_array($row->id, $allowedRows, true));
    }

    public function canAccessRowWithRole(CoursePermissionRole $role, CourseSectionRow $row): bool
    {
        if ($role->isFullAccess()) {
            return true;
        }

        $allowedCategories = $this->rolePermissionIds($role, CourseContentCategory::class);
        $allowedSections = $this->rolePermissionIds($role, CourseSection::class);
        $allowedRows = $this->rolePermissionIds($role, CourseSectionRow::class);

        $row->loadMissing('section.category');

        if (in_array($row->id, $allowedRows, true)) {
            return true;
        }

        if (in_array($row->section?->id, $allowedSections, true)) {
            return true;
        }

        return in_array($row->section?->category?->id, $allowedCategories, true);
    }

    public function filterCourseContentForStudent(Course $course, Student $student): Collection
    {
        $role = $this->getRoleForStudentCourse($student, $course);

        if (! $role) {
            return collect();
        }

        $course->loadMissing('coursecontentcategories.sections.rows');

        if ($role->isFullAccess()) {
            return $course->coursecontentcategories->values();
        }

        $allowedCategories = $this->rolePermissionIds($role, CourseContentCategory::class);
        $allowedSections = $this->rolePermissionIds($role, CourseSection::class);
        $allowedRows = $this->rolePermissionIds($role, CourseSectionRow::class);

        return $course->coursecontentcategories
            ->map(function (CourseContentCategory $category) use ($allowedCategories, $allowedSections, $allowedRows) {
                $category->setRelation(
                    'sections',
                    $category->sections
                        ->map(function (CourseSection $section) use ($allowedCategories, $allowedSections, $allowedRows, $category) {
                            $sectionRows = $section->rows;

                            $visibleRows = $sectionRows->filter(function (CourseSectionRow $row) use ($allowedCategories, $allowedSections, $allowedRows, $category, $section) {
                                return in_array($category->id, $allowedCategories, true)
                                    || in_array($section->id, $allowedSections, true)
                                    || in_array($row->id, $allowedRows, true);
                            })->values();

                            $section->setRelation('rows', $visibleRows);

                            return $section;
                        })
                        ->filter(function (CourseSection $section) use ($allowedCategories, $allowedSections, $allowedRows) {
                            return in_array($section->category->id, $allowedCategories, true)
                                || in_array($section->id, $allowedSections, true)
                                || $section->rows->isNotEmpty();
                        })
                        ->values()
                );

                return $category;
            })
            ->filter(function (CourseContentCategory $category) use ($allowedCategories) {
                return in_array($category->id, $allowedCategories, true)
                    || $category->sections->isNotEmpty();
            })
            ->values();
    }

    public function rolePermissionIds(CoursePermissionRole $role, string $modelClass): array
    {
        return $role->permissions()
            ->where('permissionable_type', $modelClass)
            ->pluck('permissionable_id')
            ->map(fn ($id) => (int) $id)
            ->all();
    }
}

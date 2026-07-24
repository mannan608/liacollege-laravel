<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Models\AssignmentSubmission;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function dashboard(Request $request)
    {
        $student = auth()->user()->student;
        $student->load([
            'courses.categories.sections.rows',
            'assignmentSubmissions.courseSectionRow',
        ]);

        $access = $this->studentCourseAccess($student);

        $courses = $student->courses->filter(function ($course) use ($access) {

            if (in_array($course->id, $access['courses'])) {
                return true;
            }

            $course->setRelation(
                'categories',
                $course->categories->filter(function ($category) use ($access) {

                    if (in_array($category->id, $access['categories'])) {
                        return true;
                    }

                    $category->setRelation(
                        'sections',
                        $category->sections->filter(function ($section) use ($access) {

                            if (in_array($section->id, $access['sections'])) {
                                return true;
                            }

                            $section->setRelation(
                                'rows',
                                $section->rows->filter(function ($row) use ($access) {
                                    return in_array($row->id, $access['rows']);
                                })
                            );

                            return $section->rows->isNotEmpty();
                        })
                    );

                    return $category->sections->isNotEmpty();
                })
            );

            return $course->categories->isNotEmpty();
        })->values();
        $submissions = AssignmentSubmission::where(
            'student_id',
            $student->id
        )
            ->get()
            ->keyBy('course_section_row_id');

        return view('frontend.pages.student.dashboard', [
            'courses' => $courses,
            'submissions' => $submissions,
            'rowPermissions' => $access['rowPermissions'],
        ]);
    }
}
<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    public function portalGuideLine()
    {
        return view('student.help.portal-guide');
    }
    public function portalLink()
    {
        return view('student.help.links');
    }

    public function portaReports()
    {
        return view('student.help.reports');
    }

    public function lodgeFormalComplaint()
    {
        return view('student.help.lodge-formal-complaint');
    }
    public function contactAdmin()
    {
        return view('student.help.lodge-formal-complaint');
    }
}

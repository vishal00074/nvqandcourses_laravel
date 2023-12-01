<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebCoursesController extends Controller
{
    public function NVQCourse()
    {
        return view('pages.nvqcourses');
    }

        public function Courses()
    {
        return view('pages.courses');
    }
}

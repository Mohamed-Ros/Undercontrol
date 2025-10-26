<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursePageController extends Controller
{
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('course-page', compact('course'));
    }
}

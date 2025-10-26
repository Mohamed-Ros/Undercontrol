<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // ✅ Get all courses
    public function index()
    {
        $courses = Course::all();
        return response()->json(['courses' => $courses], 200);
    }

    // ✅ Create a new course


    // ✅ Get a single course by ID
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return response()->json(['course' => $course], 200);
    }

    // ✅ Update an existing course


    // ✅ Delete a course
    
}

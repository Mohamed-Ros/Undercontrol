<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // ✅ Get all projects
    public function index()
    {
        $projects = Project::all();
        return response()->json(['projects' => $projects], 200);
    }

    // ✅ Create a new project


    // ✅ Show single project
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json(['project' => $project], 200);
    }

    // ✅ Update project


    // ✅ Delete project

}

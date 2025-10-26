<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    // ✅ Get all features
    public function index()
    {
        $features = Feature::all();
        return response()->json(['features' => $features], 200);
    }

    // ✅ Create new feature


    // ✅ Show single feature
    public function show($id)
    {
        $feature = Feature::findOrFail($id);
        return response()->json(['feature' => $feature], 200);
    }

    // ✅ Update existing feature

    // ✅ Delete feature

}

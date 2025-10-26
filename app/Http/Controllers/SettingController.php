<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    // ✅ Get all settings
    public function index()
    {
        $settings = Setting::all();
        return response()->json(['settings' => $settings], 200);
    }

    // ✅ Create new setting
    public function show($id)
    {
        $setting = Setting::findOrFail($id);
        return response()->json(['setting' => $setting], 200);
    }
}

<?php
 namespace App\Http\Controllers;
use App\Models\Tool;


use Illuminate\Http\Request;
class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::all();
        return response()->json(['tools' => $tools], 200);
    }
    public function show($id)
    {
        $tool = Tool::findOrFail($id);
        return response()->json(['tool' => $tool], 200);
    }
}

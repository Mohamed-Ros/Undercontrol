<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // ✅ Get all FAQs
    public function index()
    {
        $faqs = Faq::all();
        return response()->json(['faqs' => $faqs], 200);
    }

    // ✅ Create a new FAQ


    // ✅ Show one FAQ
    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return response()->json(['faq' => $faq], 200);
    }

    // ✅ Update FAQ


    // ✅ Delete FAQ

}

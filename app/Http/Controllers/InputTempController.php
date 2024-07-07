<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputTemplate; // Updated model reference

class InputTempController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'start_end_date' => 'required|string',
            'job_title' => 'required|string',
            'qualification' => 'required|string',
            'university' => 'required|string',
            'graduation_year' => 'required|string',
            'major' => 'required|string',
            'languages' => 'required|string',
            'skills' => 'required|string',
            'summary' => 'required|string',
            'experience_details' => 'required|string',
        ]);

        // Create a new template entry
        $template = InputTemplate::create($validatedData); // Updated model usage
        return response()->json(['message' => 'Template created successfully', 'template' => $template], 201);
    }

    public function index()
    {
        $templates = InputTemplate::all(); // Updated model usage

        return response()->json(['templates' => $templates], 200);
    }

    public function show($id)
    {
        $template = InputTemplate::findOrFail($id); // Updated model usage

        return response()->json(['template' => $template], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\School;
use App\Models\Section;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($schoolId)
    {
        // Fetch the school by ID
        $school = School::findOrFail($schoolId);
    
        // Fetch classes and their sections
        $classes = Classes::where('school_id', $schoolId)
            ->get()
            ->map(function ($class) {
                // Attach sections to each class
                $class->sections = Section::where('class_id', $class->id)->get();
                return $class;
            });
    
        // Pass data to the view
        return view('classes', compact('classes', 'school'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::all();
        return view('classes.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'school_id' => 'required|exists:schools,id',
        ]);

        Classes::create($validated);

        return redirect()->back()->with('success', 'Class created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $class)
    {
        $class->load('school');
        return view('classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $class)
    {
        $schools = School::all();
        return view('classes.edit', compact('class', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $class = Classes::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $class->update($validated);

        return redirect()->back()->with('success', 'Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();

        return redirect()->back()->with('success', 'Class deleted successfully');
    }

    public function getSections(Classes $class)
    {
        return response()->json($class->sections);
    }
}

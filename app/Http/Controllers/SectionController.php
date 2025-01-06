<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Classes;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index($classId)
    {
        $class = Classes::findOrFail($classId);
        $sections = Section::where('class_id', $classId)->get();
        return view('sections', compact('sections', 'class'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
        ]);

        Section::create($validated);

        return redirect()->back()->with('success', 'Section created successfully');
    }

    public function update(Request $request, $id)
    {
        $section = Section::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $section->update($validated);

        return redirect()->back()->with('success', 'Section updated successfully');
    }

    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->back()->with('success', 'Section deleted successfully');
    }
}

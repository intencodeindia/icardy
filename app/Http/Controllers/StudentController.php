<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Section;
use App\Models\School;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index($sectionId)
    {
        $section = Section::with('class.school')->findOrFail($sectionId);
        $students = Student::where('section_id', $sectionId)->get();
        $schools = School::all();
        return view('student', compact('students', 'section', 'schools'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_number' => 'required|unique:students',
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_of_birth' => 'required|date',
            'blood_group' => 'nullable|string|max:10',
            'phone_number' => 'required|string|max:15',
            'gender' => 'required|in:male,female,other',
            'school_id' => 'required|exists:schools,id',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        // Verify that the selected class belongs to the selected school
        $class = Classes::where('id', $request->class_id)
            ->where('school_id', $request->school_id)
            ->firstOrFail();

        // Verify that the selected section belongs to the selected class
        $section = Section::where('id', $request->section_id)
            ->where('class_id', $request->class_id)
            ->firstOrFail();

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('students/photos', 'public');
        }

        Student::create($validated);

        return redirect()->back()->with('success', 'Student created successfully');
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        
        $validated = $request->validate([
            'registration_number' => 'required|unique:students,registration_number,' . $student->id,
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_of_birth' => 'required|date',
            'blood_group' => 'nullable|string|max:10',
            'phone_number' => 'required|string|max:15',
            'gender' => 'required|in:male,female,other',
        ]);

        if ($request->hasFile('photo')) {
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }
            $validated['photo'] = $request->file('photo')->store('students/photos', 'public');
        }

        $student->update($validated);

        return redirect()->back()->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }
        
        $student->delete();

        return redirect()->back()->with('success', 'Student deleted successfully');
    }
}

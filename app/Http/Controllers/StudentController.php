<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Section;
use App\Models\School;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;

class StudentController extends Controller
{
    public function index($schoolId)
    {
        $school = School::findOrFail($schoolId);
        $classes = Classes::where('school_id', $schoolId)->get();
        $students = Student::whereHas('class', function($query) use ($schoolId) {
            $query->where('school_id', $schoolId);
        })->get();
        
        return view('student', compact('students', 'school', 'classes'));
    }

    public function getSections($classId)
    {
        $sections = Section::where('class_id', $classId)->get();
        return response()->json($sections);
    }

    public function importStudents(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'nullable|exists:sections,id',
            'school_id' => 'required|exists:schools,id'
        ]);

        try {
            $class = Classes::findOrFail($request->class_id);
            
            // Verify class belongs to the correct school
            if ($class->school_id != $request->school_id) {
                return redirect()->back()->with('error', 'Invalid class selected');
            }

            Excel::import(new StudentsImport(
                $request->class_id,
                $request->section_id
            ), $request->file('file'));

            return redirect()->back()->with('success', 'Students imported successfully');
        } catch (\Exception $e) {
            \Log::error('Student Import Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error importing students. Please check the file format.');
        }
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
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'nullable|exists:sections,id',
        ]);

        // Verify class belongs to the correct school
        $class = Classes::findOrFail($request->class_id);
        if ($class->school_id != $request->school_id) {
            return redirect()->back()->with('error', 'Invalid class selected');
        }

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('students/photos', 'public');
        }

        // Parse the date before saving
        $validated['date_of_birth'] = \Carbon\Carbon::parse($request->date_of_birth)->format('Y-m-d');

        Student::create($validated);

        return redirect()->back()->with('success', 'Student created successfully');
    }

    public function downloadTemplate()
    {
        $filePath = public_path('assets/files/student_template.xlsx');
        
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'Template file not found');
        }
        
        return response()->download($filePath, 'student_template.xlsx');
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

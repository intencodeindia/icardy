<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class IdCardController extends Controller
{
    public function index()
    {
        $schools = School::all();
        $students = Student::select('students.*', 'schools.name as school_name', 'schools.logo as school_logo', 'schools.address as school_address')
            ->join('classes', 'students.class_id', '=', 'classes.id')
            ->join('schools', 'classes.school_id', '=', 'schools.id')
            ->with(['class.school', 'section'])
            ->get();
        return view('print-id-card', compact('schools', 'students'));
    }

    public function filterStudents(Request $request)
    {
        $query = Student::with(['class.school', 'section']);

        if ($request->school_id) {
            $query->whereHas('class', function($q) use ($request) {
                $q->where('school_id', $request->school_id);
            });
        }

        if ($request->class_id) {
            $query->where('class_id', $request->class_id);
        }

        if ($request->section_id) {
            $query->where('section_id', $request->section_id);
        }

        if ($request->sort_by) {
            $query->orderBy($request->sort_by);
        }

        $students = $query->get();

        return view('partials.id-cards', compact('students'));
    }
}

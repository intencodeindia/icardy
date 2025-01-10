<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Classes;
use App\Models\Student;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();
        return view('schools', compact('schools'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'principle_sign' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stamp_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['logo', 'principle_sign', 'stamp_image']);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('schools/logos', 'public');
        }

        // Handle principle signature upload
        if ($request->hasFile('principle_sign')) {
            $data['principle_sign'] = $request->file('principle_sign')->store('schools/signatures', 'public');
        }

        // Handle stamp image upload
        if ($request->hasFile('stamp_image')) {
            $data['stamp_image'] = $request->file('stamp_image')->store('schools/stamps', 'public');
        }

        School::create($data);

        session()->flash('success', 'School created successfully');
        return redirect()->route('schools');
    }

    public function show($id)
    {
        $school = School::find($id);
        $schoolId = $id;
        $classes = Classes::where('school_id', $schoolId)->get();
        $students = Student::whereHas('class', function($query) use ($schoolId) {
            $query->where('school_id', $schoolId);
        })->get();
        return view('school-details', compact('school', 'classes', 'students'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $school = School::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'principle_sign' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stamp_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['logo', 'principle_sign', 'stamp_image', '_token', '_method']);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            if ($school->logo) {
                Storage::disk('public')->delete($school->logo);
            }
            $data['logo'] = $request->file('logo')->store('schools/logos', 'public');
        }

        // Handle principle signature upload
        if ($request->hasFile('principle_sign')) {
            if ($school->principle_sign) {
                Storage::disk('public')->delete($school->principle_sign);
            }
            $data['principle_sign'] = $request->file('principle_sign')->store('schools/signatures', 'public');
        }

        // Handle stamp image upload
        if ($request->hasFile('stamp_image')) {
            if ($school->stamp_image) {
                Storage::disk('public')->delete($school->stamp_image);
            }
            $data['stamp_image'] = $request->file('stamp_image')->store('schools/stamps', 'public');
        }

        $school->update($data);
        
        return redirect()->route('schools.show', $school->id)->with('success', 'School updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        // Delete associated images
        if ($school->logo) {
            Storage::disk('public')->delete($school->logo);
        }
        if ($school->principle_sign) {
            Storage::disk('public')->delete($school->principle_sign);
        }
        if ($school->stamp_image) {
            Storage::disk('public')->delete($school->stamp_image);
        }

        $school->delete();

        return redirect()->route('schools')->with('success', 'School deleted successfully');
    }
}

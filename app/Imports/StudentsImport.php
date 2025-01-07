<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation
{
    private $classId;
    private $sectionId;

    public function __construct($classId, $sectionId = null)
    {
        $this->classId = $classId;
        $this->sectionId = $sectionId;
    }

    public function model(array $row)
    {
        return new Student([
            'registration_number' => $row['registration_number'],
            'name' => $row['name'],
            'father_name' => $row['father_name'],
            'address' => $row['address'],
            'date_of_birth' => Carbon::parse($row['date_of_birth'])->format('Y-m-d'),
            'blood_group' => $row['blood_group'],
            'phone_number' => $row['phone_number'],
            'gender' => strtolower($row['gender']),
            'class_id' => $this->classId,
            'section_id' => $this->sectionId,
        ]);
    }

    public function rules(): array
    {
        return [
            'registration_number' => 'required|unique:students',
            'name' => 'required|string',
            'father_name' => 'required|string',
            'address' => 'required|string',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'blood_group' => 'nullable|string',
            'phone_number' => 'required|string',
            'gender' => 'required|in:male,female,other,MALE,FEMALE,OTHER',
        ];
    }
} 
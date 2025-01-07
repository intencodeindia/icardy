<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StudentTemplateExport implements FromArray, WithHeadings, WithStyles
{
    public function array(): array
    {
        // Get a sample image from public assets
        $sampleImage = '';
        try {
            $sampleImage = base64_encode(file_get_contents(public_path('assets/images/avatar.png')));
        } catch (\Exception $e) {
            \Log::error('Error loading sample image: ' . $e->getMessage());
        }

        $students = [];
        for ($i = 1; $i <= 10; $i++) {
            $gender = $i % 2 === 0 ? 'female' : 'male';
            $students[] = [
                'STD' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'Student ' . $i,
                'Parent ' . $i,
                $i . ' Main Street, City',
                '2000-01-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                ['A+', 'B+', 'O+', 'AB+'][$i % 4],
                '123456789' . $i,
                $gender,
                $sampleImage
            ];
        }

        return $students;
    }

    public function headings(): array
    {
        return [
            'registration_number',
            'name',
            'father_name',
            'address',
            'date_of_birth',
            'blood_group',
            'phone_number',
            'gender',
            'photo'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(10);
        $sheet->getColumnDimension('I')->setWidth(50);

        return [
            1 => ['font' => ['bold' => true]],
            'A1:I1' => [
                'fill' => [
                    'fillType' => 'solid',
                    'color' => ['rgb' => 'CCCCCC']
                ]
            ],
        ];
    }
} 
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'registration_number',
        'name',
        'father_name',
        'address',
        'photo',
        'date_of_birth',
        'blood_group',
        'phone_number',
        'gender',
        'section_id',
        'class_id'
    ];

    protected $dates = ['date_of_birth'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}

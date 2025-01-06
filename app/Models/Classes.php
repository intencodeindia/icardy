<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'school_id'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'class_id');
    }
}

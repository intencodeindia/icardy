<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class School extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'logo',
        'phone',
        'email',
        'website',
        'principle_sign',
        'stamp_image'
    ];

    /**
     * Get all classes for the school.
     */
    public function classes(): HasMany
    {
        return $this->hasMany(Classes::class);
    }

    /**
     * Get all sections through classes.
     */
    public function sections(): HasManyThrough
    {
        return $this->hasManyThrough(Section::class, Classes::class);
    }

    /**
     * Get all students through classes.
     */
    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(Student::class, Classes::class);
    }
}

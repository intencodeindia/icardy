<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function getSections(Classes $class)
    {
        return response()->json($class->sections);
    }
} 
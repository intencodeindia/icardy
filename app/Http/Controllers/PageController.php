<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function features()
    {
        return view('pages.features');
    }

    public function pricing()
    {
        return view('pages.pricing');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function helpCenter()
    {
        return view('pages.help-center');
    }

    public function documentation()
    {
        return view('pages.documentation');
    }

    public function apiReference()
    {
        return view('pages.api-reference');
    }

    public function status()
    {
        return view('pages.status');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }
} 
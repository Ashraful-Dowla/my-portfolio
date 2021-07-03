<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Testimonial;

class PortfolioController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        $testimonials = Testimonial::all();
        return view('portfolio.index')->with([
            'skills' => $skills,
            'testimonials' => $testimonials,
        ]);
    }
}

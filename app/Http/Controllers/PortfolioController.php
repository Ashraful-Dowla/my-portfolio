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

    public function download()
    {
        $filepath = public_path('/storage/cv/my_cv.pdf');
        $filename = 'Ashraful_Dowla_CV.pdf';
        $headers = array(
            'Content-Type: application/pdf',
        );

        return response()->download($filepath, $filename, $headers);
    }
}

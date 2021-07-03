<?php

namespace App\Http\Controllers;

use App\Models\Skill;

class PortfolioController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('portfolio.index')->with(
            ['skills' => $skills]
        );
    }
}

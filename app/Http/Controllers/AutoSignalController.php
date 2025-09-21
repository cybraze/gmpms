<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class AutoSignalController extends Controller
{
    //
    public function auto_signal_project(){


        $project = ProjectAutoSignaling::with(['division', 'section'])->get();

        // Get all sections of a division
        $division = Division::with('sections')->get();

        // Get all projects of a section
        $section = AutoSignalSection::with('projects')->get();

        return view('ei_works', compact('projects','division','section'));


    }
}

<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function program()
    {
        $program = Program::orderBy('id', 'desc')->paginate(6);

        return view('Page.page.program', ['program' => $program]);
    }

    public function programDetail($slug)
    {
        $program = Program::where('slug', '=', $slug)->first();
        $user = Donate::where('program_id', '=', $program->id)->where('status', '=', 'Valid')->orderBy('id', 'desc')->get();

        return view('Page.page.programdetails', ['program' => $program, 'user' => $user]);
    }
}

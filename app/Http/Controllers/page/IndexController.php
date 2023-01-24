<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Program;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $main = Program::where('prioritas', '=', 'Iya')->where('status', '=', 'Aktif')->orderBy('id', 'desc')->get();
        $program = Program::where('status', '=', 'Aktif')->orderBy('id', 'desc')->get()->take(6);
        $berita = News::orderBy('id', 'desc')->get()->take(6);
        return view('Page.page.index', ['main' => $main, 'program' => $program, 'berita' => $berita]);
    }
}

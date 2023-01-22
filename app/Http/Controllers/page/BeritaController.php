<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function berita()
    {
        $berita = News::with('user')->orderBy('news.id', 'desc')->paginate(4);
        $beritaNews = News::orderBy('id', 'desc')->get()->take(4);

        return view('Page.page.blog', ['berita' => $berita, 'news' => $beritaNews]);
    }

    public function beritaDetail($slug)
    {
        $berita = News::join('users', 'news.user_id', 'users.id')
            ->select('news.*', 'name')
            ->where('slug', '=', $slug)->first();
        $prev = News::where('id', '<', $berita->id)->orderBy('id', 'desc')->first();
        $next = News::where('id', '>', $berita->id)->orderBy('id', 'asc')->first();
        $beritaNews = News::orderBy('id', 'desc')->get()->take(4);


        return view('Page.page.blogdetail', ['berita' => $berita, 'next' => $next, 'prev' => $prev, 'news' => $beritaNews]);
    }
}

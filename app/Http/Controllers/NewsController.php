<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword', '');
        $news = News::latest()
            ->search($keyword)
            ->paginate(9)
            ->appends('keyword');

        return view('news.index', compact('news', 'keyword'));
    }

    public function show(string $slug)
    {
        $news = News::findBySlug($slug)->first();

        abort_unless(
            !is_null($news),
            404,
            'Berita yang dimaksud tidak ditemukan!'
        );

        return view('news.show', compact('news'));
    }
}

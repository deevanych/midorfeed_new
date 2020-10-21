<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Stream;

class PageController extends Controller
{
    //

    public function index() {
        $news = News::latest()->where('published', 1)->take(5)->get();
        $streams = Stream::orderBy('updated_at', 'desc')->take(19)->get()->sortByDesc('viewers');
        return view('home', compact('news', 'streams'));
    }
}

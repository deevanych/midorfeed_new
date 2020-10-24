<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Stream;

class PageController extends Controller
{
    //

    public function index() {

        $news = News::latest()->where('published', 1)->take(9)->get();
        $streams = Stream::orderBy('updated_at', 'desc')->take(19)->get()->sortByDesc('viewers')->slice(0, 10);
        return view('home', compact('news', 'streams'));
    }
}

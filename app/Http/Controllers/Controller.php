<?php

namespace App\Http\Controllers;

use App\Models\GameVersion;
use App\Models\News;
use App\Models\Stream;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        $news = News::latest()->where('published', 1)->take(5)->get();
        $streams = Stream::orderBy('updated_at', 'desc')->take(19)->get()->sortByDesc('viewers');
        return view('home', compact('news', 'streams'));
    }
}

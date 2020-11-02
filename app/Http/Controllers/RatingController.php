<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\FindOrder;
use App\Models\News;
use App\Models\Rating;
use App\Models\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $modelType, $modelSlug)
    {
        //
        $user_id = 0;
        switch ($modelType) {
            case 'streams':
                $model = Stream::whereName($modelSlug)->first();
                break;
            case 'comments':
                $model = Comment::whereId($modelSlug)->first();
                $user_id = $model->user_id;
                break;
            case 'teammates':
                $model = FindOrder::whereId($modelSlug)->first();
                break;
            default:
                $model = News::whereSlug($modelSlug)->first();
                break;
        }
        $givenRating = $model->rating->where('user_id', Auth::id())->first();
        if (empty($givenRating)) {
            $rating = new Rating();
            $rating->type = $request->type;
            $rating->author_id = Auth::id();
            $rating->user_id = $user_id;
            $model->rating()->save($rating);
        } else {
            $givenRating->delete();
            if ($givenRating->type !== $request->type) {
                $rating = new Rating();
                $rating->type = $request->type;
                $rating->author_id = Auth::id();
                $rating->user_id = $user_id;
                $model->rating()->save($rating);
            }
        }
        return ["rating_value" => $model->rating_value, "given_rating" => $model->given_rating];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}

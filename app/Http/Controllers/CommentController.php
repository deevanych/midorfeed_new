<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use App\Models\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param string $modelType
     * @param string $modelSlug
     * @return array
     */
    public function
    __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request, $modelType, $modelSlug)
    {
        switch ($modelType) {
            case 'streams':
                $model = Stream::whereName($modelSlug);
                break;
            default:
                $model = News::whereSlug($modelSlug);
                break;
        }
        $model = $model->first();
        return ['commentsCount' => $model->getCommentsCount(), 'comments' => $model->comments];
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $modelType, $modelSlug)
    {
        //
        $validatedData = $request->validate([
            'text' => 'required|max:255',
        ]);

        switch ($modelType) {
            case 'streams':
                $model = Stream::whereName($modelSlug);
                break;
            default:
                $model = News::whereSlug($modelSlug);
                break;
        }
        $model = $model->first();

        $comment = new Comment();
        $comment->parent_id = $request->input('parentId');
        $comment->text = $request->input('text');
        $comment->user_id = Auth::id();
        if ($request->input('parentId')) {
            $parentComment = Comment::find($request->input('parentId'));
            if ($parentComment->nesting_level < 4) {
                $comment->nesting_level = $parentComment->nesting_level + 1;
            } else {
                $comment->nesting_level = $parentComment->nesting_level;
                $comment->parent_id = $parentComment->parent_id;
            }
        }
        $model->comments()->save($comment);

        return ['commentsCount' => $model->getCommentsCount(), 'comment' => $comment->fresh()];
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}

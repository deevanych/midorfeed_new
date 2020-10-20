<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'modelType' => 'required',
            'modelId' => 'required',
            'text' => 'required|max:255',
        ]);

        $comment = new Comment();
        $comment->model_type = "App\Models\\" . $request->input('modelType');
        $comment->model_id = $request->input('modelId');
        $comment->parent_id = $request->input('parentId');
        $comment->text = $request->input('text');
        $comment->user_id = 131;
        if ($request->input('parentId')) {
            $parentComment = Comment::find($request->input('parentId'));
            if ($parentComment->nesting_level < 4) {
                $comment->nesting_level = $parentComment->nesting_level + 1;
            } else {
                $comment->nesting_level = $parentComment->nesting_level;
                $comment->parent_id = $parentComment->parent_id;
            }
        }
        $comment->save();

        return $comment->fresh();
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

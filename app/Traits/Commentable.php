<?php
namespace App\Traits;

trait Commentable {
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'model')->whereDoesntHave('parentComment');
    }

    public function getCommentsCount()
    {
        return $this->morphMany('App\Models\Comment', 'model')->count();
    }
}

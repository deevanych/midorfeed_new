<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed name
 * @method static whereName($modelSlug)
 */
class Stream extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'model')->whereDoesntHave('parentComment');
    }

    public function getCommentsCount()
    {
        return $this->morphMany('App\Models\Comment', 'model')->count();
    }

    public function getLink() {
        return route('streams.show', $this->name);
    }

    public function getImage() {
        return asset(Storage::url("streams/$this->name.jpg"));
    }
}

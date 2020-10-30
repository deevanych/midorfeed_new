<?php

namespace App\Models;

use App\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed name
 * @method static whereName($modelSlug)
 */
class Stream extends Model
{
    use HasFactory, Commentable;

    protected $guarded = [];

    public function getLink() {
        return route('streams.show', $this->name);
    }

    public function getImage() {
        return asset(Storage::url("streams/$this->name.jpg"));
    }
}

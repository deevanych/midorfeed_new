<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    const POSITIVE = 1;
    const NEGATIVE = -1;

    protected $guarded = [];

    public function author() {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}

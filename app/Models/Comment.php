<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = [
        'author',
    ];

    protected $hidden = [
        'user_id',
        'model_id',
        'model_type',
    ];

    public function author() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
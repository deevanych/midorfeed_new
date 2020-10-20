<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String model_type
 * @property String model_id
 * @property Integer user_id
 * @property String text
 * @property Integer parent_id
 * @property Integer nesting_level
 */
class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = [
        'author',
        'comments'
    ];

    protected $hidden = [
        'user_id',
        'model_id',
        'model_type',
    ];

    public function author() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }

    public function parentComment() {
        return $this->belongsTo('App\Models\Comment', 'parent_id');
    }
}

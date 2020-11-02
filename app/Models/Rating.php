<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    const POSITIVE = 1;
    const NEGATIVE = 0;

    public function author() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}

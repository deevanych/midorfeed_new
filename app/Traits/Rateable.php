<?php
namespace App\Traits;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

trait Rateable {

    protected function getArrayableAppends()
    {
        $this->appends = array_unique(array_merge($this->appends, ['rating_value', 'given_rating']));
        return parent::getArrayableAppends();
    }

    public function rating() {
        return $this->morphMany('App\Models\Rating', 'model');
    }

    public function getRatingValueAttribute() {
        return $this->morphMany('App\Models\Rating', 'model')->sum('type');
    }

    public function getGivenRating() {
        return $this->morphMany('App\Models\Rating', 'model')->whereUserId(Auth::id());
    }

    public function getGivenRatingAttribute() {
        return $this->morphMany('App\Models\Rating', 'model')->whereUserId(Auth::id())->first('type');
    }
}

<?php
namespace App\Traits;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

trait Rateable {

    public function rating() {
        return $this->morphMany('App\Models\Rating', 'model');
    }

    public function getPositiveRating() {
        return $this->morphMany('App\Models\Rating', 'model')->whereType(Rating::POSITIVE);
    }

    public function getNegativeRating() {
        return $this->morphMany('App\Models\Rating', 'model')->whereType(Rating::NEGATIVE);
    }

    public function getRatingValueAttribute() {
        return $this->getPositiveRating()->count() - $this->getNegativeRating()->count();
    }

    public function getGivenRating() {
        return $this->morphMany('App\Models\Rating', 'model')->whereUserId(Auth::id());
    }

    public function getGivenRatingAttribute() {
        return $this->morphMany('App\Models\Rating', 'model')->whereUserId(Auth::id())->first('type');
    }
}

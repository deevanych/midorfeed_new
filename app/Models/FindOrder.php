<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereId($modelSlug)
 */
class FindOrder extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'model')->whereDoesntHave('parentComment');
    }

    public function getText($length = null) {
        $over = " ...";
        return (!is_null($length) && strlen($this->text) > ($length - strlen($over)) ? mb_substr($this->text, 0, $length - strlen($over)).$over : $this->text);
    }

    public function getCommentsCount()
    {
        return $this->morphMany('App\Models\Comment', 'model')->count();
    }

    public function purposes() {
        return $this->belongsToMany('App\Models\FindOrderPurpose');
    }

    public function getTranslatedDate()
    {
        $date = Carbon::parse($this->updated_at)->locale('ru');
        $month = $date->getTranslatedMonthName('Do MMMM');
        return $date->format("d $month Y в H:m");
    }

    public function getPrime() {
        if ($this->prime_from == $this->prime_to) {
            return 'Не указано';
        }
        return $this->prime_from.':00 - '.$this->prime_to.':00';
    }
}

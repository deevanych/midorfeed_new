<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FindOrder extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

//    public function purposes() {
//        return $this->belongsToMany('App\Purpose');
//    }
//
//    public function prime() {
//        if ($this->prime_from == $this->prime_to) {
//            return 'Не указано';
//        }
//        return $this->prime_from.':00 - '.$this->prime_to.':00';
//    }
//
//    public function formatPurposes() {
//        $purposes = '';
//        foreach ($this->purposes as $purpose) {
//            $purposes .= '<span class=\'tag\'>'.$purpose->title.'</span>';
//        }
//        return $purposes;
//    }
}

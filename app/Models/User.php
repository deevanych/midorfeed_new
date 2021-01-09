<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'avatar_url',
        'link',
        'rating'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\UserProfile');
    }

    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\GameRole');
    }

    public function getAvatarUrlAttribute(): string
    {
        return asset(Storage::url('avatars/'.$this->steamid.'.jpg'));
    }

    public function getLinkAttribute(): string
    {
        return route('users.show', $this->id);
    }

    public function getRatingAttribute(): string
    {
        $rating = $this->profile->season_rank;
        $ranks = array("Калибровка", "Рекрут", "Страж", "Рыцарь", "Герой", "Легенда", "Властелин", "Божество", "Титан");
        $stars = array("", "I", "II", "III", "IV", "V", "VI", "VII");
        $star = $rating%10;
        $medal = intdiv($rating, 10);
        return $ranks[$medal].' '.$stars[$star];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed name
 */
class Stream extends Model
{
    use HasFactory;

    public function getLink() {
        return route('stream.show', $this->name);
    }

    public function getImage() {
        return asset(Storage::url("streams/$this->name.jpg"));
    }
}

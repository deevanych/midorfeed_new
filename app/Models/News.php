<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property string description
 * @property string text
 * @property string slug
 * @property int id
 * @property mixed tags
 */
class News extends Model
{
    use HasFactory;

    public function getLink()
    {
        return route('news.show', $this->slug);
    }

    public function getImage()
    {
        return asset(Storage::url("news/$this->slug.jpg"));
    }

    public function getDescription()
    {
        return ($this->description ? $this->description : trim(preg_replace('/\s+/', ' ', mb_substr(strip_tags($this->text), 0, 160))) . " ...");
    }

    public function getReadTime()
    {
        $text = $this->text;
        $word_count = count(preg_split('/\W+/u', strip_tags($text), -1, PREG_SPLIT_NO_EMPTY));
        $minutes = floor($word_count / 250);
        if ($minutes == 0) {
            $minutes = '<1';
        }
        return $minutes;
    }

    public function getKeywords()
    {
        if (count($this->tags) == 0) {
            return false;
        }
        $tags = $this->tags->toArray();
        $tag_arr = [];
        foreach ($tags as $tag) {
            $tag_arr[] = $tag['title'];
        }
        return implode(', ', $tag_arr);
    }

    public function getNextNews()
    {
        return News::where('id', '<', $this->id)->orderBy('created_at', 'desc')->where('published', 1)->first();
    }

    public function getPrevNews()
    {
        return News::where('id', '>', $this->id)->where('published', 1)->first();
    }
}

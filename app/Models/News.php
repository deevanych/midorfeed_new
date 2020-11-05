<?php

namespace App\Models;

use App\Traits\Commentable;
use App\Traits\Rateable;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property string description
 * @property string text
 * @property string slug
 * @property int id
 * @property mixed tags
 * @property string source_link
 * @property string title
 * @property int site_id
 * @property string created_at
 * @method static whereSlug(string $modelSlug)
 */
class News extends Model
{
    use HasFactory, Commentable, Rateable;

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tags');
    }

    public function site()
    {
        return $this->belongsTo('App\Models\NewsSite');
    }

    public function getLink()
    {
        return route('news.show', $this->slug);
    }

    public function getImage()
    {
        return asset(Storage::url("news/$this->slug.jpg"));
    }

    public function getTitle($length = null) {
        $over = " ...";
        return (!is_null($length) && strlen($this->title) > ($length - strlen($over)) ? mb_substr($this->title, 0, $length - strlen($over)).$over : $this->title);
    }

    public function getDescription($length = null)
    {
        $over = " ...";
        $description = ($this->description ? $this->description : trim(preg_replace('/\s+/', ' ', mb_substr(strip_tags($this->text), 0, 160))) . " ...");
        return (!is_null($length) && strlen($description) > $length - strlen($over) ? mb_substr($description, 0, $length - strlen($over)).$over : $description);
    }

    public function getReadTime()
    {
        $text = $this->text;
        $word_count = count(preg_split('/\W+/u', strip_tags($text), -1, PREG_SPLIT_NO_EMPTY));
        $minutes = floor($word_count / 250);

        return (!$minutes ? '<1' : $minutes);
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

    public function getTranslatedDate()
    {
        $date = Carbon::parse($this->created_at)->locale('ru');
        $month = $date->getTranslatedMonthName('Do MMMM');
        return $date->format("d $month Y в H:m");
    }

    public function getNextNews()
    {
        return News::where('id', '<', $this->id)->orderBy('created_at', 'desc')->where('published', 1)->first();
    }

    public function getPrevNews()
    {
        return News::where('id', '>', $this->id)->where('published', 1)->first();
    }

    public function sendToSocialNetworks()
    {
        $tags = $this->tags()->pluck('title');
        $tags_out = '';
        foreach ($tags as $tag) {
            $tags_out .= '#' . str_replace(' ', '', $tag) . ' ';
        }
        $token = \config('app.vk_token');
        $app_id = '182344905';
        $url = "https://api.vk.com/method/";
        $client = new Client(['base_uri' => $url]);

        $request = $client->request('GET', 'wall.post', [
            'query' => [
                'access_token' => $token,
                'v' => '5.70',
                'owner_id' => "-$app_id",
                'from_group' => 1,
                'message' => '📣📣📣 ' . $this->title . '

                ' . $this->getDescription() . '

                #midorfeed #мидорфид #dota2 #дота2 ' . $tags_out,
                'attachments' => 'https://midorfeed.ru/news/' . $this->slug,
                'services' => 'twitter, facebook'
            ]
        ]);

        echo $request->getBody()->getContents();
    }
}

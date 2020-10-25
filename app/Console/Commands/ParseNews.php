<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Models\NewsSite;
use App\Models\Tags;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class ParseNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing news from sites';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $news_sites = NewsSite::where('parse', 1)->get();
        $i = 0;
        $savePath = 'public/news';
        foreach ($news_sites as $site) {
            // dota2.ru
            if ($site->id === 1) {
                $rss = simplexml_load_file($site->news_page);
                foreach ($rss->channel->item as $article) {
                    $slug = str_slug($article->title);
                    $news = News::where('title', $article->title)->first();
                    if (empty($news)) {
                        $html = file_get_contents($article->link);
                        $crawler = new Crawler(null, 'https://dota2.ru');
                        $crawler->addHtmlContent($html, 'UTF-8');
                        $news = new News;
                        $news->title = $article->title;
                        $news->slug = $slug;
                        $news->source_link = $article->link;
                        $news->site_id = $site->id;
                        $news->created_at = Carbon::create($crawler->filter('time[itemprop=datePublished]')->attr('content'));
                        $news->description = $crawler->filter('div[itemprop=articleBody]')->children('p')->first()->text();
                        $image = $crawler->filter('div[itemprop=image]')->children('img')->attr('src');
                        $image = file_get_contents($image);
                        Storage::put("$savePath/$slug.jpg", $image);
                        $articleContent = $crawler->filter('div[itemprop=articleBody]');
                        $articleContent->filter('img')->each(function (Crawler $node) use ($savePath) {
                            $uri = $node->image()->getUri();
                            if (stripos($uri, "heroes")) {
                                $re = '/heroes\/(.*)\/icon(.*)/m';
                                preg_match_all($re, $uri, $matches, PREG_SET_ORDER, 0);
                                $name = $matches[0][1].$matches[0][2];
                            } else {
                                $name = basename($uri);
                            }
                            if (!Storage::exists("$savePath/$name")) {
                                Storage::put("$savePath/$name", file_get_contents($uri));
                            }
                            $node->getNode(0)->removeAttribute('src');
                            $node->getNode(0)->setAttribute('src', asset(Storage::url("news/$name")));
                        });
                        $news->text = $articleContent->html();
                        $news->save();
                        if (!empty($crawler->filter('div[class=news-tags]'))) {
                            $crawler->filter('div[class=news-tags]')->children('a')->each(function (Crawler $node, $i) use ($news) {
                                $tag = $node->text();
                                $pattern = "/(.*) \[.*\]/m";
                                preg_match_all($pattern, $tag, $matches, PREG_SET_ORDER, 0);
                                $tag = Tags::firstOrCreate(['title' => $matches[0][1]]);
                                $news->tags()->save($tag);
                            });
                        }
//                        $news->sendToSocialNetworks();
                        $i++;
                    } else {
                        continue;
                    }
                }
                return ['count' => $i];
            }
        }
    }
}

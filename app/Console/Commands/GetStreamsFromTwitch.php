<?php

namespace App\Console\Commands;

use App\Models\Stream;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GetStreamsFromTwitch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'streams:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get streams from twitch';

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
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.twitch.tv/kraken/',
            'query' => [
                'game' => 'dota 2',
                'stream_type' => 'live',
                'limit' => '19',
                'client_id' => 'kpq4v7y8pepbk0dn2xt25u0rdg3aob'
            ],
            'headers' => [
                'Accept' => 'application/vnd.twitchtv.v5+json'
            ],
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $result = json_decode($client->request('GET', 'streams')->getBody()->getContents());
        foreach ($result->streams as $item) {
            $stream = Stream::firstOrNew(['name' => $item->channel->name]);
            $stream->title = $item->channel->status;
            $stream->name = $item->channel->name;
            $stream->viewers = $item->viewers;
            $stream->save();

            $image = file_get_contents($item->preview->medium);
            Storage::put('public/streams/'.$item->channel->name.'.jpg', $image);
        }
    }
}

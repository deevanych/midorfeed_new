<?php

namespace App\Console\Commands;

use App\Models\SiteSettings;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class GetDotaStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dota:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get dota status from https://crowbar.steamstat.us/Barney';

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
        //
        $client = new Client([
            'base_uri' => 'https://crowbar.steamstat.us/gravity.json',
        ]);
        $result = json_decode($client->request('GET')->getBody()->getContents());
//        $html = json_decode(file_get_contents("https://crowbar.steamstat.us/gravity.json"));
        $services = $result->services;
        foreach ($services as $service) {
            if ($service[0] === 'dota2') {
                $options = SiteSettings::where('key', 'dota_status')->first();
                $options->value = $service[2];
                $options->save();
            }
            continue;
        }
    }
}

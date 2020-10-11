<?php

namespace App\Console\Commands;

use App\Models\GameVersion;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class UpdateDotaVersion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get dota version from stratz.com';

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
            'base_uri' => 'https://api.stratz.com/api/v1/',
            'timeout'  => 10.0,
        ]);

        $response = json_decode($client->request('GET', 'GameVersion')->getBody()->getContents());

        foreach ($response as $version) {
            GameVersion::firstOrCreate(
                ['version_id' => $version->id],
                ['version_id' => $version->id,
                    'name' => $version->name,
                    'start_date' => $version->startDate
                ]
            );
        }

    }
}

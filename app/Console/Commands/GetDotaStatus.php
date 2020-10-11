<?php

namespace App\Console\Commands;

use App\Models\SiteSettings;
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
        $html = json_decode(file_get_contents("https://crowbar.steamstat.us/Barney"));
        $status = $html->services->dota2->status;
        $options = SiteSettings::where('key', 'dota_status')->first();
        $options->value = $status;
        $options->save();
    }
}

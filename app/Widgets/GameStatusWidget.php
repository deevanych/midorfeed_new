<?php

namespace App\Widgets;

use App\Models\SiteSettings;
use Arrilot\Widgets\AbstractWidget;

class GameStatusWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        return view('widgets.game_status', [
            'status' => SiteSettings::where('key', 'dota_status')->first(),
            'config' => $this->config,
        ]);
    }
}

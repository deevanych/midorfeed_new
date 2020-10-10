<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\GameVersion;

class GameVersionWidget extends AbstractWidget
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

        $version = GameVersion::orderBy('version_id', 'desc')->first();
        return view('widgets.game_version', [
            'version' => $version,
            'config' => $this->config,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Invisnik\LaravelSteamAuth\SteamAuth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * The SteamAuth instance.
     *
     * @var SteamAuth
     */
    protected $steam;

    /**
     * The redirect URL.
     *
     * @var string
     */
    protected $redirectURL = '/';

    /**
     * AuthController constructor.
     *
     * @param SteamAuth $steam
     */
    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    public function show() {
        return Auth::user();
    }

    public function logout() {
        Auth::logout();
        return redirect(route('home'));
    }
    /**
     * Redirect the user to the authentication page
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectToSteam()
    {
        return $this->steam->redirect();
    }

    /**
     * Get user info and log in
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();
            if (!is_null($info)) {
                $user = $this->findOrNewUser($info);
                Auth::login($user, true);

                return redirect(session('prev')); // redirect to site
            }
        }
        session(['prev' => url()->previous()]);
        return $this->redirectToSteam();
    }

    /**
     * Getting user by info or created if not exists
     *
     * @param $info
     * @return User
     */

    protected function convert_id($id)
    {
        if (strlen($id) === 17) {
            $converted = substr($id, 3) - 61197960265728;
        } else {
            $converted = '765'.($id + 61197960265728);
        }
        return (string) $converted;
    }

    public function findOrNewUser($info)
    {
        $dotaid = $this->convert_id($info->steamID64);

        $user = User::firstOrNew(['steamid' => $info->steamID64]);
        $user->personaname = $info->personaname;
        $user->realname = $info->realname;
        $user->steamid = $info->steamID64;
        $user->dotaid = $dotaid;
        $user->profileurl = $info->profileurl;
        $user->save();

        $client = new Client([
            'base_uri' => 'https://api.stratz.com/api/v1/',
            'timeout'  => 10.0,
        ]);

        $response = json_decode($client->request('GET', 'Player/'.$dotaid)->getBody()->getContents());

        $profile = UserProfile::firstOrNew(['user_id' => $user->id]);
        $profile->is_dota_plus_subscriber = $response->steamAccount->isDotaPlusSubscriber ?? false;
        $profile->match_count = $response->matchCount ?? 0;
        $profile->win_count = $response->winCount ?? 0;
        $profile->season_rank = $response->steamAccount->seasonRank ?? 0;
        $profile->first_match_date = $response->firstMatchDate ?? null;
        $profile->last_region_id = $response->lastRegionId ?? null;
        $profile->user_id = $user->id;
        $profile->save();

        $image = file_get_contents($info->avatarfull);
        Storage::put('public/avatars/'.$info->steamID64.'.jpg', $image);

        return $user;
    }
}

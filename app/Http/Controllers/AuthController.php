<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{

    private $oauth;
    private $user;
    private $request;

    private $scopes = [ 'guilds', 'guilds.members.read' ];

    public function redirect( Request $request )
    {
        return Socialite::driver( 'discord' )
            ->scopes( $this->scopes )
            ->redirect();
    }

    public function callback( Request $request )
    {
        $this->oauth = Socialite::driver( 'discord' )->user();
        $this->request = $request;

        if( $this->_user_exists() ) {
            $this->_refresh_discord_roles();
            $this->_authorize();
        } else if ( $this->_user_is_guild_member() ) {
            $this->_new_user();
            $this->_authorize();
        } else {
            return redirect()->route( 'auth.notfound' );
        }
        
        return redirect()->route( 'pages.home' );
    }

    public function logout( Request $request )
    {
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route( 'pages.home' );
    }

    public function notfound()
    {
        return redirect()->route( 'pages.nouser' );
    }

    private function _user_exists()
    {
        $discord_id = $this->oauth->id;
        $user = false;
        try {
            $user = User::where( 'discord_id', $discord_id )->firstOrFail();
        } catch( Exception $e ) {
            return false;
        }

        $this->user = $user;
        return true;
    }

    private function _user_is_guild_member()
    {
        $guild_id = config( 'discord.guild' );
        $user_guilds = $this->_discord_api_call( '/users/@me/guilds' );
        foreach( $user_guilds as $guild ) {
            if( $guild[ 'id' ] === $guild_id ) {
                return true;
            }
        }
        return false;
    }

    private function _new_user()
    {
        $user = new User();
        $oauth = $this->oauth;
        
        // basic info
        $user->discord_id = $oauth->id;
        $user->nickname = $oauth->nickname;
        $user->name = $oauth->name;
        $user->email = $oauth->email;
        $user->avatar = $oauth->avatar;

        // roles & join date
        $guildid = config( 'discord.guild' );
        $member_data = $this->_discord_api_call( "/users/@me/guilds/$guildid/member" );
        $user->roles = implode( ",", $member_data['roles'] );
        $user->joined_on = date( 'Y-m-d', strtotime( $member_data[ 'joined_at' ] ) );

        $user->save();

        $this->user = $user;
    }

    private function _refresh_discord_roles()
    {
        $user = $this->user;
        $guildid = config( 'discord.guild' );
        $member_data = $this->_discord_api_call( "/users/@me/guilds/$guildid/member" );
        $user->roles = implode( ",", $member_data[ 'roles' ] );
    }

    private function _authorize()
    {
        $this->request->session()->regenerate();
        session([ 'user' => $this->user->id ] );
    }

    private function _discord_api_call( $path ) 
    {
        $path = "https://discord.com/api" . $path;

        $response = Http::withToken( $this->oauth->token )
            ->accept( 'application/json' )
            ->get( $path );
        return $response->json();
    }
}

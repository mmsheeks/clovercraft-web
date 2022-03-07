<?php

namespace App\Http\Modules;

use Illuminate\Http\Request;
use App\Models\User;

class PageModule extends Module
{
    public const module           = 'pages';
    public const roles            = [];
    public const viewNamespace    = 'pages';

    public function index() {
        return $this->render( 'index' );
    }

    public function join() {
        return $this->render( 'join' );
    }

    public function nouser() {
        return $this->render( 'usernotfound' );
    }

    public function members() {
        $users = User::where( 'listed', true )
            ->orderBy( 'joined_on', 'ASC' )
            ->get();
        return $this->render( 'members', [ 'members' => $users ] );
    }
}

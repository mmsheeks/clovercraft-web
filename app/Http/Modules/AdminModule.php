<?php

namespace App\Http\Modules;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Shops;

class AdminModule extends Module
{
    public const module           = 'admin';
    public const roles            = [ 'admin' ];
    public const viewNamespace    = 'admin.';

    public function index() {
        return $this->render( 'dashboard' );
    }
}

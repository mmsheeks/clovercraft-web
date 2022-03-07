<?php

namespace App\Http\Modules;

use Illuminate\Http\Request;

use App\Models\User;

class GuideModule extends Module
{
    public const module           = 'guide';
    public const roles            = [];
    public const viewNamespace    = 'guide.';

    public function index() {
        return $this->render( 'pages.index' );
    }

}

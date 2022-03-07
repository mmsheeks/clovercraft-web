<?php

namespace App\Http\Modules;

use Illuminate\Http\Request;

use App\Models\User;

class BlogModule extends Module
{
    public const module           = 'blog';
    public const roles            = [];
    public const viewNamespace    = 'blog.';

    public function index() {
        return $this->render( 'index' );
    }
}

<?php

namespace App\Http\Modules;

use Illuminate\Http\Request;

use App\Models\User;

class LibraryModule extends Module
{
    public const module           = 'library';
    public const roles            = [];
    public const viewNamespace    = 'library.';
}

<?php namespace App\Http\Modules\Util;

use Illuminate\Support\Facades\Route;

class ModuleRouteGroup {

    public static function group( $moduleClass, $path, $viewNamespace, $callback ) {
        $group_configuration = [
            'controller' => $moduleClass,
            'prefix'     => $path,
            'name'       => $viewNamespace
        ];
        Route::group( $group_configuration, $callback );
    }
}
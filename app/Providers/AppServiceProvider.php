<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('role', function( $role ) {
            $user = User::find( session( 'user' ) );
            
            // short circuit if invalid user
            if( empty( $user ) ) return false;
            
            // get the role IDs for provided keys
            $role_id = config( "discord.roles.$role" );
            $admin_role_id = config( "discord.roles.admin" );

            // check if the user has one of the approved roles
            $user_roles = explode( ",", $user->roles );

            return in_array( $role_id, $user_roles ) || in_array( $admin_role_id, $user_roles );
        });

        Blade::if( 'activepage', function( $route ) {
            $current = Route::currentRouteName();
            return $route === $current;
        });
    }
}

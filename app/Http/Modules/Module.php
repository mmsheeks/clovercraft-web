<?php namespace App\Http\Modules;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Models\User;

class Module extends Controller {

    public const module           = '';
    public const roles            = [];
    public const viewNamespace    = '';

    public static function route_group( $path, $callback )
    {
        $called = get_called_class();
        $namespace = $called::viewNamespace . ".";
        Route::controller( $called )->group( function() use ( $path, $namespace, $callback ) {
            if( $path !== "" ) {
                Route::prefix( $path )->group( function() use ( $namespace, $callback ) {
                    Route::name( $namespace )->group( $callback );
                });
            } else {
                Route::name( $namespace )->group( $callback );
            }
        });
    }

    protected function render( $view, $data = [] )
    {
        $data = $this->prepare_data( $data );
        $view = $this->namespace_view( $view );

        if( $this->is_authorized() ) {
            return view( $view, $data );
        } else {
            return redirect()->route( 'pages.nouser' );
        }

    }

    protected function namespace_view( $view ) {
        // if a namespace is set, prepend it to the view
        $namespace = $this::viewNamespace;
        if( $namespace !== '' ) {
            $view = "$namespace.$view";
        }

        return $view;
    }

    /**
     * prepare_data - prepares the data array for views before sending to 
     *                blade for rendering
     * 
     * @param Array $data - any custom data for the specific view
     * @return Array $data - the modified data array with our global values
     */
    protected function prepare_data( $data ) {
        
        $data[ 'user' ] = $this->get_user();
        $data[ 'module' ] = get_called_class()::module;

        return $data;
    }

    protected function get_user() {

        // get user id from session, return false on no user
        $id = session( 'user', false );
        if( $id === false ) return false;

        // get the user, return false if no match
        $user = User::find( $id );
        if( empty( $user ) ) return false;

        return $user;
    }

    protected function is_authorized() {
        $called = get_called_class();
        $roles = $called::roles;

        // if no roles are defined, allow access
        if( empty( $roles ) ) return true;

        // we need to be authenticated, since roles are defined, so...
        
        // get the user, return false if not logged in
        $user = $this->get_user();
        if( $user === false ) return false;

        // check the user against the roles
        foreach( $roles as $role ) {
            if( $user->role( $role ) ) {
                return true;
            }
        }
        return false;
    }

    protected function _timezones() {
        $timezones = Storage::get( 'mcdata/timezones.json' );
        return json_decode( $timezones );
    }


}
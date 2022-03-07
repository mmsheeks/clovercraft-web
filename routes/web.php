<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Modules\ShopModule;
use App\Http\Modules\GuideModule;
use App\Http\Modules\LibraryModule;
use App\Http\Modules\BlogModule;
use App\Http\Modules\ProfileModule;
use App\Http\Modules\PageModule;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// page routes
ProfileModule::route_group( 'me', function() {
    
    Route::get(     '/',            'profile' )->name( 'profile' );
    Route::post(    '/',            'update_profile' )->name( 'profile_update' );

    Route::get(     'shops',        'shops' )->name( 'shops' );
    Route::get(     'shops/new',    'shops_new' )->name( 'shops_new' );
});

ShopModule::route_group( 'shops', function() {
    Route::get( '/', 'shops' )->name( 'shops' );

    Route::get( '/items/{id}/selector-row', 'item_selectorrow' )->name( 'shops_item_selectorrow' );
});

PageModule::route_group( '', function() {
    Route::get( '/', 'index' )->name( 'home' );
    Route::get( 'join', 'join' )->name( 'join' );
    Route::get( 'nouser', 'nouser' )->name( 'nouser' );
    Route::get( 'members', 'members' )->name( 'members' );
});




/**
 * Authentication Routes
 */
Route::prefix( 'auth' )->group( function() { 
    Route::controller( AuthController::class )->group( function() {
        Route::name( 'auth.' )->group( function() {
            Route::get( 'redirect', 'redirect' )->name( 'redirect' );
            Route::get( 'callback', 'callback' )->name( 'callback' );
            Route::get( 'logout',   'logout'   )->name( 'logout'   );
        });
    });
});

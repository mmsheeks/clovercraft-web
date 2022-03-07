<?php namespace App\Http\Modules;

use Illuminate\Http\Request;

use App\Models\Shop;
use App\Models\McItem;
use App\Models\City;

class ProfileModule extends Module {

    public const module           = 'profile';
    public const roles            = [ 'member', 'mod', 'admin' ];
    public const viewNamespace    = 'me';

    public $cities = [
        'aescland'      => 'Aescland / The Skyless City',
        'arcadia'       => 'Arcadia',
        'capeclover'    => 'Cape Clover',
        'eldershire'    => 'Eldershire',
        'noden'         => 'Noden'
    ];

    public function profile() {
        if( ! $this->is_authorized() ) return redirect()->route( 'pages.home' );
        return $this->render( 'profile', [ 
            'timezones' => $this->_timezones(),
            'cities'    => $this->cities,
        ]);
    }

    public function update_profile( Request $request ) {
        if( ! $this->is_authorized() ) return redirect()->route( 'pages.home' );
        $input = $request->all();
        $user = $this->get_user();
        $user->pronouns = $input['pronouns'];
        $user->birthday = date( 'Y-m-d', strtotime( $input[ 'birthday' ] ) );
        $user->timezone = $input[ 'timezone' ];
        $user->citizenship = $input[ 'citizenship' ];
        $user->bio = $input[ 'bio' ];
        $user->listed = isset( $input[ 'listed' ] ) && $input[ 'listed' ] === "1";
        $user->save();
        return redirect()->route( 'me.profile' );
    }

    public function shops() {
        
        if( ! $this->is_authorized() ) return redirect()->route( 'pages.home' );

        $user = $this->get_user();
        $shops = $user->shops;
        return $this->render( 'shops', [
            'shops' => $shops
        ]);
    }

    public function shops_new() {
        $items = McItem::all();
        $cities = City::all();
        return $this->render( 'newShop', [ 'items' => $items, 'cities' => $cities ] );
    }
}
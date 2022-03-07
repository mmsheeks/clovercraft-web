<?php

namespace App\Http\Modules;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Item;

class ShopModule extends Module
{

    public const module           = 'shop';
    public const roles            = [];
    public const viewNamespace    = 'shop';

    public function shops() {
        $items = Item::all();
        $shops = Shop::all();
        
        return $this->render( 'shops', [ 'shops' => $shops, 'items' => $items ] );
    }

    public function item_selectorrow( Item $id ) {
        $view = view( 'shop.itemselectorrow', [ 'item' => $id ] )->render();
        return response()->json( [ 'html' => $view ] );
    }
}

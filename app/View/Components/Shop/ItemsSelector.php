<?php

namespace App\View\Components\Shop;

use Illuminate\View\Component;

use App\Models\Item;

class ItemsSelector extends Component
{

    public $items;

    public $shop;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $shop = null )
    {
        $this->items = Item::all();
        if( $shop !== null ) {
            $this->shop = $shop;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shop.items-selector');
    }
}

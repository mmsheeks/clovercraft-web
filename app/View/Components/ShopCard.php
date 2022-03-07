<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\McItem;

class ShopCard extends Component
{

    public $shop;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($shop)
    {
        $this->shop = $shop;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shop-card');
    }
}

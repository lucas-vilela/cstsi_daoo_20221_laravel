<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductsTable extends Component
{
    public $products;
    public $type;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($products,$type)
    {
        $this->products = $products;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('tables.products');
    }
}

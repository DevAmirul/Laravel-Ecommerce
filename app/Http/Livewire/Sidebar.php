<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Sidebar extends Component {

    public $minPrice;
    public $maxPrice;

    public function mount() {
        $this->minPrice = 0;
        $this->maxPrice = 10000;
    }

    //shop's event will be called when the min/max price is updated
    public function updated() {
        $this->emit( 'sliderPriceEmit', [$this->minPrice, $this->maxPrice] );
    }

    public function render() {
        $categories     = Category::all();
        $randomProducts = Product::inRandomOrder()->get( ['name', 'regular_price', 'image','slug'] )->take( 10 );

        return view( 'livewire.sidebar', [
            'categories'     => $categories,
            'randomProducts' => $randomProducts,
        ] );
    }
}

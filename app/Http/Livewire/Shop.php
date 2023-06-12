<?php

namespace App\Http\Livewire;

use App\Http\Livewire\LiveWireTraits\CartTraits;
use App\Http\Livewire\LiveWireTraits\WishlistTraits;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component {

    use WithPagination;
    use CartTraits;
    use WishlistTraits;

    public $sortBy   = 'default';
    public $pageSize = 32;
    public $minPrice = 0;
    public $maxPrice = 10000;

    protected $listeners = ['sliderPriceEmit'];

    public function sliderPriceEmit($arg) {
        $this->minPrice = $arg[0];
        $this->maxPrice = $arg[1];
    }

    public function toCart($productId, $productName, $productPrice) {
        $this->addToCart($productId, $productName, $productPrice);
        return redirect()->route('cart');
    }

    public function render() {

        if ($this->sortBy === 'date') {
            $products = Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])
                ->orderBy('created_at', 'desc')
                ->paginate($this->pageSize, ['id', 'name', 'slug', 'regular_price', 'sale_price', 'image']);
        } elseif ($this->sortBy === 'price') {
            $products = Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])
                ->orderBy('regular_price', 'asc')
                ->paginate($this->pageSize, ['id', 'name', 'slug', 'regular_price', 'sale_price', 'image']);
        } elseif ($this->sortBy === 'price-desc') {
            $products = Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])
                ->orderBy('regular_price', 'desc')
                ->paginate($this->pageSize, ['id', 'name', 'slug', 'regular_price', 'sale_price', 'image']);
        } else {
            if ($this->minPrice == 0 && $this->maxPrice == 10000) {
                $products = Product::paginate($this->pageSize, ['id', 'name', 'slug', 'regular_price', 'sale_price', 'image']);
            } else {
                $products = Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])
                    ->paginate($this->pageSize, ['id', 'name', 'slug', 'regular_price', 'sale_price', 'image']);
            }
        }

        return view('livewire.shop', [
            'products'        => $products,
            'cartContents'    => $this->cartContent(),
            'WishlistContent' => $this->WishlistContent(),
        ]);
    }

}

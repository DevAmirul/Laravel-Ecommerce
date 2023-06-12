<?php

namespace App\Http\Livewire;

use App\Http\Livewire\LiveWireTraits\CartTraits;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component {
    use CartTraits;
    use WithPagination;

    public function toCart($productId, $productName, $productPrice) {
        $this->addToCart($productId, $productName, $productPrice);
        return redirect()->route('cart');
    }

    public function render() {

        $products = Product::inRandomOrder()->take(18)->get(['id', 'name', 'slug', 'regular_price', 'sale_price', 'image']);

        $latestProducts = Product::orderBy('id', 'desc')->get(['id', 'name', 'slug', 'regular_price', 'sale_price', 'image'])->take(15);

        $sale = Sale::find(1);
        if ($sale->status === 1) {
            $saleProducts = Product::where('sale_price', '>', 0)->get(['name', 'slug', 'regular_price', 'sale_price', 'image'])->take(15);
        }

        return view('livewire.home', [
            'sale'           => $sale,
            'saleProducts'   => $saleProducts ?? null,
            'latestProducts' => $latestProducts,
            'products'       => $products,
            'cartContents'   => $this->cartContent(),
        ]);
    }

}

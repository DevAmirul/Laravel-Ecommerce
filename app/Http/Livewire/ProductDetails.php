<?php

namespace App\Http\Livewire;

use App\Http\Livewire\LiveWireTraits\CartTraits;
use App\Http\Livewire\LiveWireTraits\WishlistTraits;
use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component {
    use CartTraits;
    use WishlistTraits;

    public string $slug;
    public $quantity = 1;

    public function increaseQuantity() {
        $this->quantity++;
    }
    public function decreaseQuantity() {
        if ( $this->quantity > 1 ) {
            $this->quantity--;
        }
    }
    public function mount( $slug ) {
        $this->slug = $slug;
    }

    public function toCart( $productId, $productName, $productPrice ) {
        $this->addToCart( $productId, $productName, $productPrice );
        return redirect()->route( 'cart' );

    }
    
    public function calculateReview( $product ) {
        $countRating = 0;
        $countReview = 0;
        $orderItems  = $product->OrderItem->where( 'r_status', 1 );

        if ( $orderItems->count() > 0 ) {
            foreach ( $orderItems as $item ) {
                $countRating += $item->review->rating;
                $countReview++;
            }
            $avaRating = $countRating / $countReview;
            return ['avaRating' => $avaRating, 'countReview' => $countReview];
        }else {
            return ['avaRating' => 0, 'countReview' => 0];
        }
    }

    public function render() {
        $product         = Product::where( 'slug', $this->slug )->first();
        $relatedProducts = Product::where( 'category_id', $product->category_id )
            ->inRandomOrder()->limit( 10 )->get(['name','slug','image','regular_price']);

        return view( 'livewire.product-details', [
            'product'         => $product,
            'relatedProducts' => $relatedProducts,
            'cartContents'    => $this->cartContent(),
            'WishlistContent' => $this->WishlistContent(),
            'calculateReview' => $this->calculateReview( $product ),
        ] );
    }

}

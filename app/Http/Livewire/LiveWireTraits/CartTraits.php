<?php

namespace App\Http\Livewire\LiveWireTraits;

use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

trait CartTraits {

    public function addToCart( int $productId, string $productName, int $productPrice, int $productQuantity = 1 ) {
        Cart::instance( 'cart' )->add( $productId, $productName, $productQuantity, $productPrice )->associate( Product::class );
        $this->emitTo( 'count', 'render' );
    }

    public function cartContent() {
        return Cart::instance( 'cart' )->content();
    }

    public function cartCount() {
        return Cart::instance( 'cart' )->content()->count();
    }

    public function incrementQty( string $listRowId ) {
        $product = Cart::instance( 'cart' )->get( $listRowId );
        $qty     = $product->qty + 1;
        Cart::instance( 'cart' )->update( $listRowId, $qty );
    }

    public function decrementQty( string $listRowId ) {
        $product = Cart::instance( 'cart' )->get( $listRowId );
        $qty     = $product->qty - 1;
        Cart::instance( 'cart' )->update( $listRowId, $qty );
    }

    public function removeCartItem( string $listRowId ) {
        Cart::instance( 'cart' )->remove( $listRowId );
        $this->emitTo( 'count', 'render' );
    }

    public function destroyCart() {
        Cart::instance( 'cart' )->destroy();
        $this->emitTo( 'count', 'render' );
    }

    public function CartInstance() {
        return Cart::instance( 'cart' );
    }

}

<?php

namespace App\Http\Livewire\LiveWireTraits;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

trait WishlistTraits {

    public function addToWishlist( int $productId, string $productName, int $productPrice ) {
        Cart::instance( 'Wishlist' )->add( $productId, $productName, 1, $productPrice )->associate( Product::class );

        $this->emitTo( 'count', 'render' );
    }

    public function WishlistContent() {
        return Cart::instance( 'Wishlist' )->content();
    }

    public function WishlistCount() {
        return Cart::instance( 'Wishlist' )->content()->count();
    }

    public function removeWishlistItem( string | null $listRowId, int | null $productId ) {
        if ( $productId !== null ) {
            foreach ( $this->WishlistContent() as $value ) {
                if ( $value->id === $productId ) {
                    Cart::instance( 'Wishlist' )->remove( $value->rowId );
                }
            }
        } else {
            Cart::instance( 'Wishlist' )->remove( $listRowId );
        }
        $this->emitTo( 'count', 'render' );
    }

    public function destroyWishlist() {
        Cart::instance( 'Wishlist' )->destroy();
        $this->emitTo( 'count', 'render' );
    }

    public function moveToCart( string $listRowId ) {
        $item = Cart::instance( 'Wishlist' )->get( $listRowId );
        $this->removeWishlistItem( $listRowId, null );
        Cart::instance( 'cart' )->add( $item->id, $item->name,1, $item->price )
            ->associate( Product::class );
        $this->emitTo( 'count', 'render' );
    }

}

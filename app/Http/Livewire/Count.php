<?php

namespace App\Http\Livewire;

use App\Http\Livewire\LiveWireTraits\CartTraits;
use App\Http\Livewire\LiveWireTraits\WishlistTraits;
use Livewire\Component;

class Count extends Component {
    use WishlistTraits;
    use CartTraits;
    public $hello = 2;

    protected $listeners = ['render'];

    public function render() {
        return <<<'blade'
            <div class="wrap-icon right-section">
            <div class="wrap-icon-section wishlist">
                    <a href="{{ Route('wishlist') }}" class="link-direction">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                        <div class="left-info">
                        <span class="index">{{ $this->WishlistCount() }}</span>
                        <span class="title">Wishlist</span>
                        </div>
                        </a>
                </div>
                <div class="wrap-icon-section minicart">
                    <a href="{{ Route('cart') }}" class="link-direction">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        <div class="left-info">
                            <span class="index">{{ $this->cartCount() }}  item</span>
                            <span class="title">CART</span>
                        </div>
                    </a>
                </div>
                <div class="wrap-icon-section show-up-after-1024">
                    <a href="#" class="mobile-navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
            </div>
        blade;
    }
}

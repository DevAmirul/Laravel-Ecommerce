<?php

namespace App\Http\Livewire;

use App\Http\Livewire\LiveWireTraits\WishlistTraits;
use Livewire\Component;

class Wishlist extends Component {
    use WishlistTraits;

    public function render() {
        return view( 'livewire.wishlist', [
            'WishlistContent' => $this->WishlistContent(),
        ] );
    }
}

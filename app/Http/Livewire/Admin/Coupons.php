<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Coupons extends Component {

    public function deleteCoupon( $couponId ) {
        $coupon = Coupon::find( $couponId );
        $coupon->delete();
        //here flush message
    }

    public function render() {
        $coupons = Coupon::all();
        return view( 'livewire.admin.coupons', [
            'coupons' => $coupons,
        ] )->layout( 'layouts.base' );
    }
}

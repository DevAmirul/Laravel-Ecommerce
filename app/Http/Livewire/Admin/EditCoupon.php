<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCoupon extends Component {

    use WithFileUploads;

    public string $couponId;
    public string $code;
    public string $type;
    public string $value;
    public string $cartValue;
    public string $expiryDate;

    public function mount( $couponId ) {
        $coupon = Coupon::find( $couponId );

        $this->couponId   = $coupon->id;
        $this->code       = $coupon->code;
        $this->type       = $coupon->type;
        $this->value      = $coupon->value;
        $this->cartValue  = $coupon->cart_value;
        $this->expiryDate = $coupon->expiry_date;
    }

    protected $rules = [
        'code'      => 'required|unique:coupons',
        'type'      => 'required',
        'value'     => 'required|numeric',
        'cartValue' => 'required|numeric',
    ];

    public function updateCoupon() {
        $this->validate();

        $coupon = Coupon::find( $this->couponId );

        $coupon->code        = $this->code;
        $coupon->type        = $this->type;
        $coupon->value       = $this->value;
        $coupon->cart_value  = $this->cartValue;
        $coupon->expiry_date = $this->expiryDate;
        $coupon->save();
    }

    public function render() {
        return view( 'livewire.admin.edit-coupon' )->layout( 'layouts.base' );
    }
}

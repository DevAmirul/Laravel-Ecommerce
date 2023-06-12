<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddCoupon extends Component {
    use WithFileUploads;

    public string $code;
    public string $type;
    public string $value;
    public string $cartValue;
    public string $expiryDate;

    protected $rules = [
        'code'      => 'required|unique:coupons',
        'type'      => 'required',
        'value'     => 'required|numeric',
        'cartValue' => 'required|numeric',
        'expiryDate' => 'required',
    ];

    public function addCoupon() {
        $this->validate();

        $coupon = new Coupon();

        $coupon->code       = $this->code;
        $coupon->type       = $this->type;
        $coupon->value      = $this->value;
        $coupon->cart_value = $this->cartValue;
        $coupon->expiry_date = $this->expiryDate;
        $coupon->save();
    }

    public function render() {
        return view( 'livewire.admin.add-coupon' )->layout( 'layouts.base' );
    }
}

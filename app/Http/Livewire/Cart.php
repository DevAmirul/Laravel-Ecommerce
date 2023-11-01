<?php

namespace App\Http\Livewire;

use App\Http\Livewire\LiveWireTraits\CartTraits;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Setting;
use Livewire\Component;

class Cart extends Component {
    use CartTraits;

    public string $haveCouponCode;
    public string $couponCode;
    public int $discount;
    public int $subTotalAfterDiscount;
    public int $taxAfterDiscount;
    public int $totalAfterDiscount;

    public string $name;
    public string $mobile;
    public string $address;
    public string $shipping_address;
    public string $extra_note;

    public function mount() {
        if (session()->has('coupon')) {

            if (session()->has('checkout')) {
                session()->forget('checkout');
            }

            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subTotalAfterDiscount,
                'tax'      => $this->taxAfterDiscount,
                'total'    => $this->totalAfterDiscount,
            ]);
        } else {
            session()->put('checkout', [
                'discount' => $this->CartInstance()->discount(),
                'subtotal' => $this->CartInstance()->subtotal(),
                'tax'      => $this->CartInstance()->tax(),
                'total'    => $this->CartInstance()->total(),
            ]);
        }
    }

    protected function rules() {
        return [
            'name'             => 'required',
            'mobile'           => 'required|numeric',
            'address'          => 'required',
            'shipping_address' => 'required',
        ];
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function placeOrder() {
        if (isset($this->shipping_address)) {
            $settings     = Setting::first(['s_cost_inside_dhaka', 's_cost_outside_dhaka']);
            $shippingCost = ($this->shipping_address == 'inside') ?
            $settings->s_cost_inside_dhaka : $settings->s_cost_outside_dhaka;
        } else {
            $shippingCost = 0;
        }

        $this->validate();

        $order                   = new Order();
        $order->subtotal         = session()->get('checkout')['subtotal'];
        $order->discount         = session()->get('checkout')['discount'];
        $order->tax              = session()->get('checkout')['tax'];
        $order->total            = session()->get('checkout')['total'] + $shippingCost;
        $order->name             = $this->name;
        $order->mobile           = $this->mobile;
        $order->address          = $this->address;
        $order->extra_note       = $this->extra_note ?? '';
        $order->shipping_address = $this->shipping_address;
        $order->shipping_cost    = $shippingCost;
        $order->save();

        foreach ($this->cartContent() as $cartItem) {
            $orderItem             = new OrderItem();
            $orderItem->product_id = $cartItem->id;
            $orderItem->order_id   = $order->id;
            $orderItem->price      = $cartItem->price;
            $orderItem->quantity   = $cartItem->qty;
            $orderItem->save();
        }

        $this->destroyCart();
        session()->forget('checkout');
        session()->forget('coupon');

        return redirect()->route('Thankyou');
    }

    // public function applyCouponCode() {
    //     $coupon = Coupon::where( 'code', $this->couponCode )
    //         ->where( 'expiry_date', '>=', Carbon::today() )
    //         ->where( 'cart_value', '<=', $this->CartInstance()->subtotal() )->first();
    //     if ( $coupon ) {
    //         session()->put( 'coupon', [
    //             'code'       => $coupon->code,
    //             'type'       => $coupon->type,
    //             'value'      => $coupon->value,
    //             'cart_value' => $coupon->cart_value,
    //         ] );
    //     } else {
    //     }
    // }

    public function calculateDiscount() {
        if (session()->has('coupon')) {
            if ($this->CartInstance()->subtotal < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                if (session()->get('coupon')['type'] == 'fixed') {
                    $this->discount = session()->get('coupon')['value'];
                } else {
                    $this->discount = ($this->CartInstance()->subtotal * session()->get('coupon')['value']) / 100;
                }
                $this->subTotalAfterDiscount = $this->CartInstance()->subtotal - $this->discount;
                $this->taxAfterDiscount      = (config('cart.tax') * $this->subTotalAfterDiscount) / 100;
                $this->totalAfterDiscount    = $this->subTotalAfterDiscount + $this->taxAfterDiscount;
                $this->couponCode            = '';
            }
        }
    }

    // public function removeCoupon() {
    //     session()->forget( 'coupon' );
    // }

    public function render() {
        $settings = Setting::first(['s_cost_inside_dhaka', 's_cost_outside_dhaka']);

        if (isset($this->shipping_address)) {
            $shippingCost = ($this->shipping_address == 'inside') ? $settings->s_cost_inside_dhaka : $settings->s_cost_outside_dhaka;
        } else {
            $shippingCost = 0;
        }

        $this->calculateDiscount();

        // foreach ($this->cartContent() as $value) {
        //     dump($value->model->image);
        // }
        // dd($this->cartContent());

        return view('livewire.cart', [
            'cartContents' => $this->cartContent(),
            'shippingCost' => $shippingCost,
            'settings'     => $settings,
        ]);
    }
}

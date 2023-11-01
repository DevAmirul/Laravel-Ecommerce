@push('title')
Cart List
@endpush
<main id="main" class="main-site">
    <div class="container ">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>cart</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            @if ($cartContents->count() > 0)
            <div class="wrap-iten-in-cart">
                <h3 class="box-title">Cart List</h3>
                <ul class="products-cart">
                    @foreach ($cartContents as $cartItem)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <a class="link-to-product">
                                <figure><img src="{{ asset('assets/images/products') }}/{{ $cartItem->model->image }}"
                                        alt=""></figure>
                            </a>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product">
                                {{ $cartItem->model->name }}
                            </a>
                        </div>
                        <div class="price-field produtc-price">
                            <p class="price">${{ $cartItem->price }}</p>
                        </div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <a class="btn btn-increase"
                                    wire:click.prevent='incrementQty("{{ $cartItem->rowId }}")'></a>
                                <input type="text" name="product-quatity" value="{{ $cartItem->qty }}" data-max="120"
                                    pattern="[0-9]*">
                                <a class="btn btn-reduce"
                                    wire:click.prevent='decrementQty("{{ $cartItem->rowId }}")'></a>
                            </div>
                        </div>
                        <div class="price-field sub-total">
                            <p class="price">${{ $cartItem->subtotal }}</p>
                        </div>
                        <div class="delete">
                            <a class="btn btn-delete" wire:click.prevent="removeCartItem('{{ $cartItem->rowId }}')">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    {{-- @if (Session::has('coupon'))
                    <p class="summary-info">
                        <span class="title">Discount({{ Session()->get('coupon')['code'] }}) <a href="#"
                        wire:click.prevent='removeCoupon'><i class="fa fa-times text-danger"></i></a></span><b
                        class="index">${{ $discount }}</b>
                    </p>
                    <p class="summary-info"><span class="title">Subtotal</span><b
                            class="index">{{ $subTotalAfterDiscount }}</b></p>
                    <p class="summary-info"><span class="title">Tex({{ config('cart.tax') }})</span><b
                            class="index">${{ $taxAfterDiscount }}</b></p>
                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                    <p class="summary-info total-info "><span class="title">Total</span><b
                            class="index">${{ $totalAfterDiscount }}</b></p>
                    @else
                    <p class="summary-info"><span class="title">Subtotal</span><b
                            class="index">{{ Cart::subtotal() }}টাকা</b></p>
                    <p class="summary-info"><span class="title">Tex</span><b class="index">{{ Cart::tax() }}</b></p>
                    <p class="summary-info total-info "><span class="title">Total</span><b
                            class="index">${{ Cart::total() }}</b></p>
                    @endif --}}
                    @php
                    $subtotal = str_replace(".00"," ", Cart::subtotal());
                    @endphp
                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">৳ {{ $subtotal }}</b>
                    </p>
                </div>
            </div>
        </div>
        <div class="checkout-info">
            <div class="summary summary-checkout che-top">
                <div class="summary-item payment-method">
                    <a href="#checkout"><button class="btn btn-medium conti-btn">অর্ডার করতে ↓</button><a>
                </div>
            </div>
            <br> <br>
        </div>
        <section id="checkout">
            <br>
            <main id="main" class="main-site left-sidebar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                            <div class=" main-content-area">
                                <div class="wrap-login-item ">
                                    <div class="register-form form-item ">
                                        <form class="form-stl" name="frm-login">
                                            <fieldset class="wrap-title">
                                                <h3 class="form-title"><span style="color:red;">*</span> অর্ডারটি
                                                    কনফার্ম
                                                    করতে আপনার নাম, ঠিকানা, মোবাইল
                                                    নাম্বার, লিখে <span style="color:red;">অর্ডার কনফার্ম করুন</span>
                                                    বাটনে
                                                    ক্লিক করুন<span style="color:red;"> *</span></h3>
                                            </fieldset>
                                            <fieldset class="wrap-input">
                                                <label for="frm-reg-lname">নাম</label>
                                                <input wire:model='name' type="text" id="frm-reg-lname" name="reg-lname"
                                                    placeholder="আপনার নাম*">
                                                @error('name') <span class="error">{{ $message }}</span> @enderror
                                            </fieldset>
                                            <fieldset class="wrap-input">
                                                <label for="frm-reg-lname">মোবাইল</label>
                                                <input wire:model='mobile' type="text" id="frm-reg-lname"
                                                    name="reg-lname" placeholder="আপনার মোবাইল নাম্বারঃ*">
                                                @error('mobile') <span class="error">{{ $message }}</span> @enderror
                                            </fieldset>
                                            <fieldset class="wrap-input">
                                                <label for="frm-reg-lname">আপনার ঠিকানা</label>
                                                <input wire:model='address' type="text" id="frm-reg-lname"
                                                    name="reg-lname" placeholder="আপনার বাসা নং,রোড নং, থানা ,জিলা *">
                                                @error('address') <span class="error">{{ $message }}</span> @enderror
                                            </fieldset>
                                            <fieldset class="wrap-input">
                                                <label for="frm-reg-lname">আপনার ডেলিভারি এরিয়া সিলেক্ট করুন</label>
                                                <br>
                                                <input wire:model='shipping_address' type="radio" id="option1"
                                                    name="option" value="inside">
                                                <label for="option1">ঢাকার ভিতর ডেলিভারি খরচ
                                                    {{ $settings->s_cost_inside_dhaka }} টাকা</label>
                                                <br>
                                                <input wire:model='shipping_address' type="radio" id="option2"
                                                    name="option" value="outside">
                                                <label for="option2">ঢাকার বাহিরে ডেলিভারি খরচ
                                                    {{ $settings->s_cost_outside_dhaka }} টাকা</label>
                                                <br>
                                                @error('shipping_address') <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="wrap-input">
                                                <label for="frm-reg-lname">অতিরিক্ত তথ্য</label>
                                                <br>
                                                <textarea wire:model='extra_note' name="extra_note" id="extra_note"
                                                    placeholder="প্রডাক্ট কালার , সাইজ ইত্যাদি যদি প্রয়োজন হয়।" rows="4"
                                                    cols="50"></textarea>
                                                @error('extra_note') <span class="error">{{ $message }}</span> @enderror
                                            </fieldset>
                                            <br>
                                            <div style="margin-top:20px;">
                                                <h3 style="color:#333333;font-size: 18px; font-weight: 600;">Subtotal -
                                                    ৳
                                                    {{ $subtotal }} </h3>
                                                <h4 style="color:#333333;font-size: 18px; font-weight: 600;">Total - ৳
                                                    {{ $shippingCost + Cart::total() }}</h4>
                                            </div>
                                            <button wire:click.prevent='placeOrder' type="submit" class="btn btn-sign"
                                                name="register">অর্ডার কনফার্ম করুন
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end main products area-->
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </main>
        </section>
    </div>
    @else
    <main id="main" class="main-site">
        <div class="container pb-60">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>You have not added any products to the card yet.</h2>
                    <a href="{{ route('shop') }}" class="btn btn-submit btn-submitx">Add a product to the
                        card</a>
                </div>
            </div>
        </div>
        <!--end container-->
    </main>
    @endif
    </div>
    <!--end main content area-->
    </div>
    <!--end container-->
</main>
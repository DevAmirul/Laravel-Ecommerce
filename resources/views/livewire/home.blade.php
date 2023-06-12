@push('title')
Home
@endpush
<main id="main">
    <div class="container">
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="{{ route('shop') }}" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/banner.png
') }}" alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="{{ route('shop') }}" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/banner2.png') }}" alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
        </div>
        <!--On Sale-->
        <div wire:ignore>
            @if ($sale->status === 1 && Carbon\Carbon::now() < $sale->sale_date)
                <div class="wrap-show-advance-info-box style-1 has-countdown">
                    <h3 class="title-box">On Sale</h3>
                    <div class="wrap-countdown mercado-countdown"
                        data-expire="{{ Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:i:s') }}"></div>
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                        data-loop="false" data-nav="true" data-dots="false"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                        @foreach ($saleProducts as $saleProduct)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product.details',['slug' => $saleProduct->slug ]) }}"
                                    title="{{ $saleProduct->name }}">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $saleProduct->image }}"
                                            width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="{{ route('product.details',['slug' => $saleProduct->slug ]) }}"
                                        class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('product.details',['slug' => $saleProduct->slug ]) }}"
                                    class="product-name"><span>{{ $saleProduct->name }}</span></a>
                                @if ($saleProduct->sale_price > 0)
                                <div class="wrap-price">
                                    <span class="product-price">${{ $saleProduct->sale_price }}</span>
                                    <del><span
                                            class="product-price regprice">${{ $saleProduct->regular_price }}</span></del>
                                </div>
                                @else
                                <div class="wrap-price"><span
                                        class="product-price">${{ $saleProduct->regular_price }}</span></div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
                </di>
                <!--Latest Products-->
                <div wire:ignore class="wrap-show-advance-info-box style-1">
                    <h3 class="title-box">Latest Products</h3>
                    <div class="wrap-products">
                        <div class="wrap-product-tab tab-style-1">
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="digital_1a">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                        data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                        @foreach ($latestProducts as $latestProduct)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{ route('product.details',['slug' => $latestProduct->slug ]) }}"
                                                    title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img
                                                            src="{{ asset('assets/images/products') }}/{{ $latestProduct->image }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    </figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="{{ route('product.details',['slug' => $latestProduct->slug ]) }}"
                                                        class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('product.details',['slug' => $latestProduct->slug ]) }}"
                                                    class="product-name"><span>{{ $latestProduct->name }}</span></a>
                                                @if ($latestProduct->sale_price > 0)
                                                <div class="wrap-price">
                                                    <span class="product-price">${{ $latestProduct->sale_price }}</span>
                                                    <del><span
                                                            class="product-price regprice">${{ $latestProduct->regular_price }}</span></del>
                                                </div>
                                                @else
                                                <div class="wrap-price"><span
                                                        class="product-price">${{ $latestProduct->regular_price }}</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Random Products-->
                <div class="wrap-show-advance-info-box style-1">
                    <h3 class="title-box">Products</h3>
                    <div class="row">
                        <ul class="product-list grid-products equal-container">
                            @foreach ($products as $key => $product)
                            <li class="col-lg-2 col-md-6 col-sm-6 col-xs-6">
                                <div class="product product-style-3 equal-elem">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details',['slug'=>$product->slug]) }}"
                                            title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img
                                                    src="{{ asset('assets/images/products') }}/{{ $product->image }}"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details',['slug'=>$product->slug]) }}"
                                            class="product-name"><span>{{ $product->name }}</span></a>
                                        @if ($product->sale_price > 0)
                                        <div class="wrap-price">
                                            <span class="product-price">${{ $product->sale_price }}</span>
                                            <del><span
                                                    class="product-price regprice">${{ $product->regular_price }}</span></del>
                                        </div>
                                        @else
                                        <div class="wrap-price"><span
                                                class="product-price">${{ $product->regular_price }}</span></div>
                                        @endif
                                        @if ($cartContents->where('id', $product->id)->count())
                                        <a class="btn add-to-cart" @disabled(true)>কার্ট-এ আছে</a>
                                        @else
                                        <a wire:click.prevent='toCart( {{ $product->id }},"{{ $product->name }}",{{ $product->regular_price }} )'
                                            class="btn add-to-cart">অর্ডার করুন</a>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="summary summary-checkout">
                        <div class="summary-item payment-method">
                            <a href="{{ route('shop') }}"><button type="submit" class="btn btn-medium conti-btn">Next
                                    Page... </button><a>
                        </div>
                    </div>
                </div>
        </div>
</main>
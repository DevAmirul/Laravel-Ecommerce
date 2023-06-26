@push('title')
Product Details
@endpush
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css"
    integrity="sha512-c7jR/kCnu09ZrAKsWXsI/x9HCO9kkpHw4Ftqhofqs+I2hNxalK5RGwo/IAhW3iqCHIw55wBSSCFlm8JP0sw2Zw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div wire:ignore class="detail-media">
                        <div class="product-gallery">
                            <ul class="slides">
                                <li data-thumb="{{ asset('assets/images/products') }}/{{ $product->image }}">
                                    <img src="{{ asset('assets/images/products') }}/{{ $product->image }}" alt="product thumbnail" />
                                </li>
                                @php
                                $images = explode(',',$product->images);
                                @endphp
                                @foreach ($images as $image)
                                @if ($image)
                                <li data-thumb="{{ asset('assets/images/products') }}/{{ $image }}">
                                    <img src="{{ asset('assets/images/products') }}/{{ $image }}" alt="product thumbnail" />
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <div class="short-desc">
                            {{ $product->short_description }}
                        </div>
                        <div class="wrap-social">
                            {{-- <a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a> --}}
                        </div>
                        @if ($product->sale_price > 0)
                        <div class="wrap-price">
                            <span class="product-price">${{ $product->sale_price }}</span>
                            <del><span class="product-price regprice">${{ $product->regular_price }}</span></del>
                        </div>
                        @else
                        <div class="wrap-price"><span class="product-price">${{ $product->regular_price }}</span></div>
                        @endif
                        <div class="stock-info in-stock">
                            <p class="availability">Availability: <b>
                                    {{
                                    ($product->stock_status === 'instock') ? 'Instock' : 'Outstock' }}
                                </b></p>
                            <p class="availability">Product Code: <b>
                                    {{ ($product->SKU ) }}
                                </b></p>
                        </div>
                        <div class="quantity">
                            @if (!$cartContents->where('id', $product->id)->count() && $product->stock_status === 'instock' )
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <a wire:click='increaseQuantity' class="btn btn-increase"></a>
                                <input type="text" name="product-quatity" value="{{ $quantity }}" data-max="120" pattern="[0-9]*">
                                <a wire:click='decreaseQuantity' class="btn btn-reduce"></a>
                            </div>
                            @endif
                        </div>
                        <div class="wrap-butons">
                            @if (!$cartContents->where('id', $product->id)->count() && $product->stock_status === 'instock')
                            <a wire:click.prevent='addToCart( {{ $product->id }},"{{ $product->name }}",{{ $product->regular_price }} )' class="btn add-to-cart">কার্ট-এ যোগ করুন</a><br>
                            <a wire:click.prevent='toCart( {{ $product->id }},"{{ $product->name }}",{{ $product->regular_price }} )' class="btn add-to-cart">অর্ডার করুন
                            </a>
                            @endif
                            <div class="wrap-btn">
                                @if ($WishlistContent->where('id', $product->id)->count())
                                <a wire:click.prevent='removeWishlistItem(null ,{{ $product->id }})' class="btn btn-wishlist fill-heart">Remove Wishlist</a>
                                @else
                                <a wire:click.prevent='addToWishlist( {{ $product->id }},"{{ $product->name }}",{{ $product->regular_price }} )' class="btn btn-wishlist">Add Wishlist</a>
                                @endif
                            </div>
                        </div>
                        <br> <br>
                        <div class="wrap-butons">
                            <a class="btn order-class
                    ">অর্ডার করতে কল করুন <span class="icon label-before fa fa-phone"> </span>01845800075
                            </a>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">Description</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                {!! $product->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end main products area-->
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <!-- Related Product widget-->
                <div wire:ignore class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Related Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($relatedProducts as $product )
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="{{ route('product.details',['slug'=>$product->slug]) }}" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" alt="{{ $product->name }}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details',['slug'=>$product->slug]) }}" class="product-name"><span>{{ $product->name }}</span></a>
                                        <div class="wrap-price"><span class="product-price">${{ $product->regular_price }}</span></div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--end sitebar-->
            <!-- 2nd Related Products widget-->
            <div wire:ignore class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                            @foreach ($relatedProducts->shuffle() as $relatedProduct)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('product.details',['slug'=>$relatedProduct->slug]) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $relatedProduct->image }}" width="214" height="214" alt="{{ $relatedProduct->name }}">
                                        </figure>
                                    </a>
                                    <div class="wrap-btn">
                                        <a href="{{ route('product.details',['slug'=>$relatedProduct->slug]) }}" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>{{ $relatedProduct->name }}</span></a>
                                    <div class="wrap-price"><span class="product-price">${{ $relatedProduct->regular_price }}</span></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--End wrap-products-->
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</main>
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"
    integrity="sha512-BmoWLYENsSaAfQfHszJM7cLiy9Ml4I0n1YtBQKfx8PaYpZ3SoTXfj3YiDNn0GAdveOCNbK8WqQQYaSb0CMjTHQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

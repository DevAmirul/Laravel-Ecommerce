@push('title')
Wish List
@endpush
<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('/') }}" class="link">home</a></li>
                <li class="item-link"><span>cart</span></li>
            </ul>
        </div>
        <div class=" main-content-area">

            @if ($WishlistContent->count() > 0)
            <div class="wrap-iten-in-cart">
                <h3 class="box-title">Wish List</h3>
                <ul class="products-cart">
                    @foreach ($WishlistContent as $wishlistItem)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <a class="link-to-product"
                                href="{{ route('product.details', ['slug' => $wishlistItem->model->slug]) }}">
                                <figure><img src="{{ asset('assets/images/products') }}/{{ $wishlistItem->model->image }}"
                                        alt=""></figure>
                            </a>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product"
                                href="{{ route('product.details', ['slug' => $wishlistItem->model->slug]) }}">
                                {{ $wishlistItem->model->name }}
                            </a>
                        </div>
                        <div class="price-field produtc-price">
                            <p class="price">${{ $wishlistItem->price }}</p>
                        </div>
                        <div class="quantity">
                            <a class="btn btn-danger" wire:click="moveToCart('{{ $wishlistItem->rowId }}')">Move to Cart</a>
                        </div>
                        <div class="delete">
                            <a class="btn btn-delete" wire:click="removeWishlistItem('{{ $wishlistItem->rowId }}', null )">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach

                </ul>
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
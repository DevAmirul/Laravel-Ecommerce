@push('title')
Category Products
@endpush
<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-shop-control">
                    <h1 class="shop-title">All products</h1>
                    <div class="wrap-right">
                        <div class="sort-item orderby ">
                            <select wire:model="sortBy" name="orderby" class="use-chosen">
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>
                        <div class="sort-item product-per-page">
                            <select wire:model="pageSize" name="post-per-page" class="use-chosen">
                                <option value="20" selected="selected">20 per page</option>
                                <option value="30">30 per page</option>
                                <option value="40">40 per page</option>
                                <option value="50">50 per page</option>
                                <option value="100">100 per page</option>
                                <option value="150">150 per page</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--end wrap shop control-->
                <div class="row">
                    <ul class="product-list grid-products equal-container">
                        @forelse ($products as $key => $product)
                        <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('product.details',['slug'=>$product->slug]) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('product.details',['slug'=>$product->slug]) }}" class="product-name"><span>{{ $product->name }}</span></a>
                                    <div class="wrap-price"><span class="product-price">${{ $product->regular_price }}</span></div>
                                    @if ($cartContents->where('id', $product->id)->count())
                                    <a class="btn add-to-cart" @disabled(true)>In Cart</a>
                                    @else
                                    <a wire:click.prevent='addToCart( {{ $product->id }},"{{ $product->name }}",{{ $product->regular_price }} )' class="btn add-to-cart">Add To Cart</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        {{-- <main id="main" class="main-site"> --}}
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 text-center">
                                        <h2>There are no products found in this category</h2>
                                    </div>
                                </div>
                            </div>
                            {{-- </main> --}}
                        @endforelse
                    </ul>
                </div>
                <div class="wrap-pagination-info">
                    {{ $products->links() }}
                </div>
            </div>
            <!--end main products area-->
            @livewire('sidebar')
            <!--end sitebar-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</main>

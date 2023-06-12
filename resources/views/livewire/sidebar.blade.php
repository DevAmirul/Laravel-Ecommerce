@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.css" />
@endpush
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
    <br> <br>
    <div class="widget mercado-widget categories-widget">
        <h2 class="widget-title">All Categories</h2>
        <div class="widget-content">
            <ul class="list-category">
                @foreach ($categories as $category)
                <li class="category-item">
                    <a href="{{ route('category',['slug' => $category->slug]) }}"
                        class="cate-link {{ request()->path() == ('category/'.$category->slug) ? 'active-cate' : 'no'}}">{{ $category->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div><!-- Categories widget-->

    <!-- brand widget-->
    <br> <br>
    <div class="widget mercado-widget filter-widget price-filter">
        <h2 class="widget-title">Filter Price <span class="text-info">{{ $minPrice }}-{{ $maxPrice }}</span></h2>
        <div class="widget-content" wire:ignore>
            <div id="slider"></div>
        </div>
    </div><!-- Price-->


    <!-- Size -->
    <br> <br>
    <div wire:ignore class="widget mercado-widget widget-product">
        <h2 class="widget-title">Popular Products</h2>
        <div class="widget-content">
            <ul class="products">
                @foreach ($randomProducts as $product)

                <li class="product-item">
                    <div class="product product-widget-style">
                        <div class="thumbnnail">
                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}" title="{{ $product->name }}">
                                <figure><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>{{ $product->name }}</span></a>
                            <div class="wrap-price"><span class="product-price">৳ {{ $product->regular_price }}</span></div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div><!-- brand widget-->
</div>
<!--end sitebar-->
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.js"></script>
<script>
    var handlesSlider = document.getElementById('slider');
    noUiSlider.create(handlesSlider, {
        start: [0, 10000],
        range: {
        'min': [0],
        'max': [10000]
        },
        pips:{
            mode: 'steps',
            stepped:true,
            density:4
        }
    });

    slider.noUiSlider.on('update', function (value) {
        @this.set('minPrice', value[0]);
        @this.set('maxPrice', value[1]);
    });
</script>
@endpush
<?php

namespace App\Http\Livewire;

use App\Http\Livewire\LiveWireTraits\CartTraits;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component {
    use CartTraits;
    use WithPagination;

    public $sortBy   = 'default';
    public $pageSize = 20;
    public $minPrice = 0;
    public $maxPrice = 10000;
    public $searchString;

    public function mount() {
        $this->searchString = request( 'search' );
    }

    protected $listeners = ['sliderPriceEmit'];

    public function sliderPriceEmit( $arg ) {
        $this->minPrice = $arg[0];
        $this->maxPrice = $arg[1];
    }

    public function render() {
        // if ( $this->sortBy === 'date' ) {
        //     $products = Product::where( 'name', 'like', '%' . $this->searchString . '%' )->orderBy( 'created_at', 'desc' )->paginate( $this->pageSize );
        // } elseif ( $this->sortBy === 'price' ) {
        //     $products = Product::where( 'name', 'like', '%' . $this->searchString . '%' )->orderBy( 'regular_price', 'asc' )->paginate( $this->pageSize );
        // } elseif ( $this->sortBy === 'price-desc' ) {
        //     $products = Product::where( 'name', 'like', '%' . $this->searchString . '%' )->orderBy( 'regular_price', 'desc' )->paginate( $this->pageSize );
        // } else {
        //     $products = Product::where( 'name', 'like', '%' . $this->searchString . '%' )->paginate( $this->pageSize );
        // }
        // return view( 'livewire.product-search', [
        //     'products'     => $products,
        //     'cartContents' => $this->cartContent(),
        // ] );

        if ( $this->sortBy === 'date' ) {
            $products = Product::where( 'name', 'like', '%' . $this->searchString . '%' )->whereBetween( 'regular_price', [$this->minPrice, $this->maxPrice] )
                ->orderBy( 'created_at', 'desc' )
                ->paginate( $this->pageSize, ['id', 'name', 'slug', 'regular_price', 'image'] );
        } elseif ( $this->sortBy === 'price' ) {
            $products = Product::where( 'name', 'like', '%' . $this->searchString . '%' )->whereBetween( 'regular_price', [$this->minPrice, $this->maxPrice] )
                ->orderBy( 'regular_price', 'asc' )
                ->paginate( $this->pageSize, ['id', 'name', 'slug', 'regular_price', 'image'] );
        } elseif ( $this->sortBy === 'price-desc' ) {
            $products = Product::where( 'name', 'like', '%' . $this->searchString . '%' )->whereBetween( 'regular_price', [$this->minPrice, $this->maxPrice] )
                ->orderBy( 'regular_price', 'desc' )
                ->paginate( $this->pageSize, ['id', 'name', 'slug', 'regular_price', 'image'] );
        } else {
            if ( $this->minPrice == 0 && $this->maxPrice == 10000 ) {
                $products = Product::where( 'name', 'like', '%' . $this->searchString . '%' )->paginate( $this->pageSize, ['id', 'name', 'slug', 'regular_price', 'image'] );
            } else {
                $products = Product::where( 'name', 'like', '%' . $this->searchString . '%' )->whereBetween( 'regular_price', [$this->minPrice, $this->maxPrice] )
                    ->paginate( $this->pageSize, ['id', 'name', 'slug', 'regular_price', 'image'] );
            }
        }

        return view( 'livewire.product-search', [
            'products'     => $products,
            'cartContents' => $this->cartContent(),
        ] );
    }
}

<?php

namespace App\Http\Livewire;

use App\Http\Livewire\LiveWireTraits\CartTraits;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategory extends Component {
    use CartTraits;
    use WithPagination;

    public string $sortBy = 'default';
    public int $pageSize  = 20;
    public string $slug;
    public $minPrice = 0;
    public $maxPrice = 10000;

    public function mount( $slug ) {
        $this->slug = $slug;
    }

    protected $listeners = ['sliderPriceEmit'];

    public function sliderPriceEmit($arg)
    {
        $this->minPrice = $arg[0];
        $this->maxPrice = $arg[1];
    }

    public function render() {

        $category     = Category::where( 'slug', $this->slug )->first(['id','name']);
        $categoryId   = $category->id;
        $categoryName = $category->name;

        if ( $this->sortBy === 'date' ) {
            $products = Product::whereBetween( 'regular_price', [$this->minPrice, $this->maxPrice] )
                ->where('category_id', $categoryId)
                ->orderBy( 'created_at', 'desc' )
                ->paginate( $this->pageSize, ['id','name', 'slug', 'regular_price', 'image'] );
        } elseif ( $this->sortBy === 'price' ) {
            $products = Product::whereBetween( 'regular_price', [$this->minPrice, $this->maxPrice] )
                ->where('category_id', $categoryId)
                ->orderBy( 'regular_price', 'asc' )
                ->paginate( $this->pageSize, ['id','name', 'slug', 'regular_price', 'image'] );
        } elseif ( $this->sortBy === 'price-desc' ) {
            $products = Product::whereBetween( 'regular_price', [$this->minPrice, $this->maxPrice] )
                ->where('category_id', $categoryId)
                ->orderBy( 'regular_price', 'desc' )
                ->paginate( $this->pageSize, ['id','name', 'slug', 'regular_price', 'image'] );
        } else {
            $products = Product::where('category_id', $categoryId)
                ->paginate( $this->pageSize, ['id','name', 'slug', 'regular_price', 'image'] );
        }

        return view( 'livewire.product-category', [
            'products'     => $products,
            'cartContents' => $this->cartContent(),
            'categoryName' => $categoryName,
        ] );
    }
}

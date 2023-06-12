<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\LiveWireTraits\DeletePhotoTrait;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component {
    use DeletePhotoTrait;
    use WithPagination;

    public $pageSize = 20;
    public $search;

    public function deleteProduct( $productId ) {
        $product = Product::find( $productId );
        $this->deletePhoto( $product->image, $product->images );
        $product->delete();
    }

    public function render() {
        $searchStr = '%' . $this->search . '%';
        $products  = Product::with('category:id,name')->where('name','LIKE', $searchStr )
            ->orWhere('stock_status','LIKE', $searchStr )
            ->orWhere('regular_price','LIKE', $searchStr )
            ->orWhere('sale_price','LIKE', $searchStr )
            ->orderBy('id','DESC')
            ->paginate( $this->pageSize );

        return view( 'livewire.admin.products', [
            'products' => $products,
        ] )->layout( 'layouts.base' );
    }
}

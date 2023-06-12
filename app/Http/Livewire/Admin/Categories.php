<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component {
    use WithPagination;

    public $pageSize = 20;

    public $search;

    public function categoryStatus( $id ) {
        $category                  = Category::find( $id );
        $category->cat_show_status = !$category->cat_show_status;
        $category->save();
    }

    public function deleteCategory( $id ) {
        $subCategories = Category::find( $id );
        $subCategories->delete();
    }

    public function render() {
        $searchStr = '%' . $this->search . '%';

        $categories = Category::where('name','LIKE', $searchStr )->paginate( $this->pageSize );

        return view( 'livewire.admin.categories', [
            'categories' => $categories,
        ] )->layout( 'layouts.base' );
    }
}

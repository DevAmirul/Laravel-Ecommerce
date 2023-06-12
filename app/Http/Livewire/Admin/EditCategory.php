<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class EditCategory extends Component {
    public $name;
    public $cate_id;

    protected $rules = [
        'name' => 'required',
    ];

    public function mount( $cate_id ) {
        $this->cate_id = $cate_id;

        $category   = Category::find( $cate_id );
        $this->name = $category->name;
    }

    public function editCategory() {
        $this->validate();

        $category       = Category::find( $this->cate_id );
        $category->name = $this->name;
        $category->slug = Str::slug( $this->name, '-' );
        $category->save();

        return redirect()->route( 'admin.categories' );
    }

    public function render() {
        return view( 'livewire.admin.edit-category' )->layout( 'layouts.base' );
    }
}

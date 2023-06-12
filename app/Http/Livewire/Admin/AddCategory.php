<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AddCategory extends Component {
    public $name;

    protected $rules = [
        'name' => 'required',
    ];

    public function addCategory() {
        $this->validate();

        $category       = new Category();
        $category->name = $this->name;
        $category->slug = Str::slug( $this->name, '-' );
        $category->save();
        $this->reset();
    }

    public function render() {

        return view( 'livewire.admin.add-category' )->layout( 'layouts.base' );
    }
}

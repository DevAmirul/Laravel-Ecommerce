<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component {

    use WithFileUploads;

    public $name;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $category_id;
    public $subcategory_id;
    public $image;
    public $images;
    public $attrId;
    public $attrValues;
    public $attrValuesInputFieldArray = [];

    public function mount() {
        $this->featured     = 0;
        $this->stock_status = 'instock';
    }

    protected $rules = [
        'name'              => 'required',
        'short_description' => 'required',
        'description'       => 'required',
        'regular_price'     => 'required|numeric',
        'sale_price'        => 'required|numeric',
        'SKU'               => 'required',
        'stock_status'      => 'required',
        'quantity'          => 'required|numeric',
        'image'             => 'required|mimes:jpeg,png,jpg',
        'category_id'       => 'required|numeric',
    ];

    public function addProduct() {
        $this->validate();

        $product       = new Product();
        $product->name = $this->name;
        $product->slug = Str::slug(
            $this->name . ' ' . $this->SKU . '' . str::random(10), '-'
        );
        $product->short_description = $this->short_description;
        $product->description       = $this->description;
        $product->regular_price     = $this->regular_price;
        $product->sale_price        = $this->sale_price;
        $product->SKU               = $this->SKU;
        $product->stock_status      = $this->stock_status;
        $product->quantity          = $this->quantity;
        $product->category_id       = $this->category_id;

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;

        if ($this->images) {
            $imagesName = '';
            foreach ($this->images as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $this->image->extension();
                $image->storeAs('products', $imgName);
                $imagesName .= ',' . $imgName;
            }
            $product->images = $imagesName;
        }
        $product->save();

        $this->reset();
    }

    public function render() {
        $categories = Category::all();

        return view('livewire.admin.add-product', [
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}

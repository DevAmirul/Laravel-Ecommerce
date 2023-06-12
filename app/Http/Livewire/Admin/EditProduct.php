<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\LiveWireTraits\DeletePhotoTrait;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component {

    use WithFileUploads;
    use DeletePhotoTrait;

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
    public $product_id;
    public $subcategory_id;
    public $image;
    public $newImage;
    public $galleryImages;
    public $newGalleryImages;
    public $previousGalleryImages;

    public function mount($slug) {
        $product                     = Product::where('slug', $slug)->first();
        $this->name                  = $product->name;
        $this->short_description     = $product->short_description;
        $this->description           = $product->description;
        $this->regular_price         = $product->regular_price;
        $this->sale_price            = $product->sale_price;
        $this->SKU                   = $product->SKU;
        $this->stock_status          = $product->stock_status;
        $this->quantity              = $product->quantity;
        $this->product_id            = $product->id;
        $this->category_id           = $product->category_id;
        $this->image                 = $product->image;
        $this->galleryImages         = explode(',', $product->images);
        $this->previousGalleryImages = $product->images;
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
        'category_id'       => 'required|numeric',
    ];

    public function updateProduct() {
        $this->validate();

        $product = Product::find($this->product_id);

        $product->name = $this->name;
        $product->slug = Str::slug(
            $this->name . ' ' . $this->SKU . '' . str::random(10),
            '-'
        );
        $product->short_description = $this->short_description;
        $product->description       = $this->description;
        $product->regular_price     = $this->regular_price;
        $product->sale_price        = $this->sale_price;
        $product->SKU               = $this->SKU;
        $product->stock_status      = $this->stock_status;
        $product->quantity          = $this->quantity;
        $product->category_id       = $this->category_id;

        if ($this->newImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('products', $imageName);
            $product->image = $imageName;
            $this->deletePhoto($this->image);
        }

        if ($this->newGalleryImages) {
            $newGalleryImagesName = '';
            foreach ($this->newGalleryImages as $key => $img) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $img->extension();
                $img->storeAs('products', $imgName);
                $newGalleryImagesName .= ',' . $imgName;
            }
            $product->images = $newGalleryImagesName;

            $this->deletePhoto(images:$this->previousGalleryImages);
        }
        $product->save();

        return redirect()->route('admin.products');
    }

    public function render() {
        $categories = Category::all();

        return view('livewire.admin.edit-product', [
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}

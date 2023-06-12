@push('title')
Add Product
@endpush
@push('nav-page-name')
Add Product
@endpush
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Add Product table</h6>
                    </div>
                </div>
                <div class="col-6 m-auto mt-3 ">
                    <form wire:submit.prevent='addProduct' class="row g-3 shadow-lg rounded-3" enctype="multipart/form-data">
                        <div class="form-floating col-md-12 shadow-lg">
                            <input wire:model.defer='name' type="text" class="form-control" id="name" placeholder="Product">
                            <label for="name">Product Name</label>
                            @error('name') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 shadow-lg">
                            <input wire:model.defer='regular_price' type="text" class="form-control" id="price" placeholder="400.00">
                            <label for="price">Regular Price</label>
                            @error('regular_price') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 shadow-lg">
                            <input wire:model.defer='sale_price' type="text" class="form-control" id="saleprice" placeholder="200.00">
                            <label for="saleprice">Sale Price</label>
                            @error('sale_price') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 ">
                            <select wire:model='category_id' class="form-select px-3" id="floatingSelect" aria-label="Floating label select example">
                                <option>Select category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Category</label>
                            @error('category_id') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12">
                            <select wire:model.defer='stock_status' class="form-select px-3" id="floatingSelect" aria-label="Floating label select example">
                                <option value="instock">Instock</option>
                                <option value="outofstock">Out of Stock</option>
                            </select>
                            <label for="floatingSelect">Stock Status</label>
                            @error('stock_status') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 shadow-lg">
                            <input wire:model.defer='quantity' type="number" class="form-control" id="saleprice" placeholder="200.00">
                            <label for="saleprice">Quantity</label>
                            @error('quantity') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 shadow-lg">
                            <input wire:model.defer='SKU' type="text" class="form-control" id="sku" placeholder="name@example.com">
                            <label for="sku">SKU</label>
                            @error('SKU') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 shadow-lg">
                            <textarea wire:model.defer='short_description' class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Short Description</label>
                            @error('short_description') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 shadow-lg">
                            <textarea wire:model.defer='description' class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Description</label>
                            @error('description') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 shadow-lg">
                            <input wire:model.defer='image' type="file" class="form-control" id="file">
                            <label for="file">Product Image</label>
                            @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="rounded" width="120" alt="">
                            @endif
                            @error('image') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 shadow-lg">
                            <input wire:model.defer='images' type="file" class="form-control" id="file" multiple>
                            <label for="file">Product Gallery</label>
                            @if ($images)
                            @foreach ($images as $image)
                            <img src="{{ $image->temporaryUrl() }}" class="rounded" width="120" alt="">
                            @endforeach
                            @endif
                            @error('images') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-danger" type="submit">Save</button>
                        </div>
                    </form>
                    <div class="col-12 d-flex justify-content-center m-4">
                        <a href="{{ url()->previous() }}" class="btn btn-danger" type="submit">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

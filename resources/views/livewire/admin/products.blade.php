@push('title')
Products
@endpush
@push('nav-page-name')
Products
@endpush
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Products table</h6>
                    </div>
                </div>
                <div class="col-12 mt-2 d-flex justify-content-around">
                    <div>
                        <select class="px-3 form-select" wire:model='pageSize' aria-label="Default select example">
                            <option value="6" selected>6 per page</option>
                            <option value="10">10 per page</option>
                            <option value="15">15 per page</option>
                            <option value="20">20 per page</option>
                        </select>
                    </div>
                    <div class="align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" wire:model.debounce.200ms='search' class="form-control">
                        </div>
                    </div>
                    <div><a href="{{ route('admin.addProduct') }}" class="btn btn-danger">Add new</a></div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Id</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Image</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Stock</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Price</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Sale Price</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Quantity</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                                </th ead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->id }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="{{ asset('assets/images/products') }}/{{ $product->image }}"
                                                    class="avatar avatar-sm rounded-circle me-2" alt="xd">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->stock_status }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->regular_price }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->sale_price }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->quantity }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $product->category->name }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ route('admin.editProduct',['slug' => $product->slug]) }}"><span
                                                class="m-3"><i class="fas fa-edit"></i></span><a>
                                                <a onclick="confirm('Are you sure,You want to delete this product?') || event.stopImmediatePropagation();"
                                                    wire:click='deleteProduct({{ $product->id }})'><span class="m-3"><i
                                                            class="fas fa-trash"></i></i></span><a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
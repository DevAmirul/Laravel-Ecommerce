@push('title')
Categories
@endpush
@push('nav-page-name')
Categories
@endpush
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Categories table</h6>
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
                        <div><a href="{{ route('admin.addCategory') }}" class="btn btn-danger">Add new</a></div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category Name</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Slug</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Show Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr class="">
                                    <td>
                                        <h6 class="mb-0 text-sm">{{ $category->name }}</h6>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $category->slug }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            @if ($category->cat_show_status === 0)
                                            <button wire:click='categoryStatus({{ $category->id }})'
                                                class="btn btn-sm btn-danger">Show </button>
                                            @else
                                            <button wire:click='categoryStatus({{ $category->id }})'
                                                class="btn btn-sm btn-success">remove </button>
                                            @endif
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ route('admin.editCategory',['cate_id'=> $category->id ]) }}" ><span class="m-3"><i class="fas fa-edit"></i></span></a>

                                        <a href="#" onclick="confirm('Are you sure,You want to delete this category?') || event.stopImmediatePropagation();"
                                            wire:click.prevent='deleteCategory({{ $category->id }})'><span class="m-3"><i
                                                    class="fas fa-trash"></i></i></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $categories->links() }}
            </div>

        </div>
    </div>
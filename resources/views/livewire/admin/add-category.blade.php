@push('title')
Add Category
@endpush
@push('nav-page-name')
Add Category
@endpush

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Add Category</h6>
                    </div>
                </div>
                <div class="col-6 m-auto mt-5 ">
                    <form wire:submit.prevent='addCategory' class="row g-3 shadow-lg rounded-3"
                        enctype="multipart/form-data">
                        <div class="form-floating col-md-12 shadow-lg">
                            @error('name') <small>{{ $message }}</small> @enderror
                            <input wire:model.defer='name' type="text" class="form-control" id="name"
                                placeholder="Code">
                            <label for="name">Category Name</label>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-danger" type="submit">Save</button>
                        </div>
                    </form>
                    {{-- <div class="col-12 d-flex justify-content-center m-4">
                            <a href="{{ url()->previous() }}" class="btn btn-danger" type="submit">Back</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</div>
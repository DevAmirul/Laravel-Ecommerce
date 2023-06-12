@push('title')
Add Coupon
@endpush
@push('nav-page-name')
Add Coupon
@endpush
@push('css')
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
@endpush
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Add Coupon table</h6>
                    </div>
                </div>
                <div class="col-6 m-auto mt-5 ">
                    <form wire:submit.prevent='addCoupon' class="row g-3 shadow-lg rounded-3"
                        enctype="multipart/form-data">
                        <div class="form-floating col-md-12 shadow-lg">
                            <input wire:model.defer='code' type="text" class="form-control" id="code"
                                placeholder="Code">
                            <label for="code">Coupon Code</label>
                            @error('code') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 ">
                            <select wire:model.defer='type' class="form-select px-3" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Select Type</option>
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percent</option>
                            </select>
                            <label for="floatingSelect">Type</label>
                            @error('type') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 shadow-lg">
                            <input wire:model.defer='value' type="text" class="form-control" id="value"
                                placeholder="100">
                            <label for="value">Value</label>
                            @error('value') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 shadow-lg">
                            <input wire:model.defer='cartValue' type="text" class="form-control" id="cartValue"
                                placeholder="200.00">
                            <label for="cartValue">Cart Value</label>
                            @error('cartValue') <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-floating col-md-12 shadow-lg">
                            <input wire:model.defer='expiryDate' type="text" class="form-control" id="date-pick"
                                placeholder="Date">
                            <label for="date-pick">Expire Date</label>
                            @error('expiryDate') <small>{{ $message }}</small> @enderror
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
    @push('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#date-pick", {
                    minDate: "today",
                    enableTime: true,
                    dateFormat: "Y-m-d h:i:s",
                });
    </script>
    @endpush
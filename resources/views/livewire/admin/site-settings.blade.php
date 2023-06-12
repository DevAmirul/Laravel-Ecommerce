@push('title')
Site Settings
@endpush
@push('nav-page-name')
Site Settings
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
                        <h6 class="text-white text-capitalize ps-3">Settings</h6>
                    </div>
                </div>
                <div class="col-6 m-auto mt-5 ">
                    <form wire:submit.prevent='siteSettings' class="row g-3 shadow-lg rounded-3"
                        enctype="multipart/form-data">

                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='email' type="email" class="form-control" id="email" placeholder="100">
                    <label for="email">Email</label>
                    @error('email') <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='phone' type="text" class="form-control" id="phone" placeholder="200.00">
                    <label for="phone">Phone</label>
                    @error('phone') <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='phone2' type="text" class="form-control" id="phone2" placeholder="200.00">
                    <label for="phone2">Phone2</label>
                    @error('phone2') <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='address' type="text" class="form-control" id="address"
                        placeholder="200.00">
                    <label for="address">Address</label>
                    @error('address') <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='s_cost_inside_dhaka' type="text" class="form-control" id="address"
                        placeholder="200.00">
                    <label for="address">Inside Dhaka</label>
                    @error('s_cost_inside_dhaka') <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='s_cost_outside_dhaka' type="text" class="form-control" id="address"
                        placeholder="200.00">
                    <label for="address">outside Dhaka</label>
                    @error('s_cost_outside_dhaka') <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='map' type="text" class="form-control" id="map" placeholder="200.00">
                    <label for="map">Map</label>
                    @error('map') <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='twitter' type="text" class="form-control" id="twitter"
                        placeholder="200.00">
                    <label for="twitter">Twitter</label>
                    @error('twitter') <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='facebook' type="text" class="form-control" id="facebook"
                        placeholder="200.00">
                    <label for="facebook">Facebook</label>
                    @error('facebook') <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='instagram' type="text" class="form-control" id="instagram"
                        placeholder="200.00">
                    <label for="instagram">Instagram</label>
                    @error('instagram') <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='youtube' type="text" class="form-control" id="youtube"
                        placeholder="200.00">
                    <label for="youtube">Youtube</label>
                    @error('youtube') <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-floating col-md-12 shadow-lg">
                    <input wire:model.defer='copyRight' type="text" class="form-control" id="copyRight"
                        placeholder="200.00">
                    <label for="copyRight">Copy Right</label>
                    @error('copyRight') <small>{{ $message }}</small> @enderror
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <button class="btn btn-danger" type="submit">Save</button>
                </div>
                </form>
                <hr>
                <div class="px-2 col-lg-6 col-md-4 mb-md-0 mb-4 shadow-lg rounded-3">
                    <div class="">
                        <h6>Add / Update sale time</h6>
                    </div>
                    <form class="row g-3 shadow-lg pb-4" wire:click.prevent='update'>
                        <div class="form-floating col-md-12">
                            <input type="text" wire:model='saleDatePick' id="date-pick" class="form-control"
                                id="datetimepicker" placeholder="YYYY/DD/MM H:M:S">
                            <label for="datetimepicker">Add Sale Date</label>
                        </div>
                        <div class="form-floating col-md-8">
                            <select wire:model='saleDateStatus' class="form-select px-3" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                            <label for="floatingSelect">Sale Status</label>
                        </div>
                        <div class="form-floating col-md-2">
                            <button class="btn btn-danger" type="submit">Save</button>
                        </div>

                    </form>
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
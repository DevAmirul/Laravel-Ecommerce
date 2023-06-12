@push('title')
Orders
@endpush
@push('nav-page-name')
Orders
@endpush
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Orders table</h6>
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
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Order ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Subtotal</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Mobile
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Delete
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Details
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                <tr>
                                    <td>
                                        <h6 class="mb-0 text-sm text-center">{{ $item->id }}</h6>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0">{{ $item->subtotal }}</p>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0"> {{ $item->total }}</p>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0"> {{ $item->name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0"> {{ $item->mobile }}</p>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0">{{ $item->status }} </p>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0"> {{ $item->created_at }}
                                        </p>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="deliveryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                Delivery Status
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="deliveryDropdown">
                                                <li><a wire:click='updateOrderStatus({{ $item->id }},"delivered")' class="dropdown-item" href="#">Delivered</a></li>
                                                <li><a wire:click='updateOrderStatus({{ $item->id }},"canceled")' class="dropdown-item" href="#">Canceled</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a onclick="confirm('Are you sure,You want to delete this Order?') || event.stopImmediatePropagation();" wire:click='deleteOrder({{ $item->id }})'><span class="m-3"><i class="fas fa-trash"></i></i></span><a>
                                    </td>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0">
                                            <a href="{{ route('admin.ordersDetails',['orderId' => $item->id]) }}"><button class="btn btn-primary">Details</button></a>
                                        </p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>

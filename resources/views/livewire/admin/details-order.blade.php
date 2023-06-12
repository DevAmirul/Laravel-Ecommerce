@push('title')
Order Details
@endpush
<main>
    <div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    
                            <div class="card my-4">
                                <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                        <h6 class="text-white text-capitalize ps-3">Order details</h6>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <tbody>
                                                <tr class="d-flex justify-content-between">
                                                    <td>
                                                        Order Id
                                                    </td>
                                                    <td>
                                                        <h6>{{ $order->id }}</h6>
                                                    </td>
                                                    <td>
                                                        Order Date
                                                    </td>
                                                    <td>
                                                        <h6>{{ $order->created_at }}</h6>
                                                    </td>
                                                    <td>
                                                        Status
                                                    </td>
                                                    <td>
                                                        <h6>{{ $order->status }}</h6>
                                                    </td>
                                                    @if ($order->status == 'delivered')
                                                    <td>
                                                        Delivered
                                                    </td>
                                                    <td>
                                                        <h6>{{ $order->delivered_date }}</h6>
                                                    </td>
                                                    @elseif ($order->status == 'canceled')
                                                    <td>
                                                        Canceled
                                                    </td>
                                                    <td>
                                                        <h6>{{ $order->canceled_date }}</h6>
                                                    </td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Order Items</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <h6>Order Items</h6>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Image</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Product Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Product Price</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Quantity</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->OrderItem as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        <img src="{{ asset('assets/images/products') }}/{{ $item->product->image }}"
                                                            class="avatar avatar-sm rounded-circle me-2" alt="xd">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $item->product->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $item->price }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $item->quantity }}</p>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-6">
                    <div class="card my-4">
                        <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Billing Details</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h6>Name</h6>
                                            </td>
                                            <td>
                                                {{ $order->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Phone</h6>
                                            </td>
                                            <td>
                                                {{ $order->mobile }}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <h6>Address</h6>
                                            </td>
                                            <td>
                                                {{ $order->address }}
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card my-4">
                        <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Order Summary</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <tbody>
                                        <tr class="d-flex justify-content-between">
                                            <td>
                                                Subtotal
                                            </td>
                                            <td>
                                                <h6>{{ $order->subtotal }}</h6>
                                            </td>
                                        </tr>

                                        <tr class="d-flex justify-content-between">
                                            <td>
                                                Shipping
                                            </td>
                                            <td>
                                                <h6>{{ $order->shipping_cost }}</h6>
                                            </td>
                                        </tr>
                                        <tr class="d-flex justify-content-between">
                                            <td>
                                                Total
                                            </td>
                                            <td>
                                                <h6>{{ $order->total }}</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($order->extra_note)
    <div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Extra Note</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-2">
                                <p> {{ $order->extra_note }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</main>
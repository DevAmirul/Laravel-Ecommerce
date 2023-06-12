@push('title')
Coupons
@endpush
@push('nav-page-name')
Coupons
@endpush

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class=" card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class=" bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Coupons table</h6>
                    </div>
                </div>
                <div class="col-12 mt-2 d-flex justify-content-around">
                    <div><a href="{{ route('admin.addCoupon') }}" class="btn btn-danger">Add new</a></div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Id</th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Coupon Code</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Coupon Type</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Coupon Value</th>

                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Cart Value</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Expiry Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $coupon->id }}</p>
                                    </td>

                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $coupon->code }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $coupon->type }}</p>
                                    </td>
                                    @if ($coupon->type == 'fixed')
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">${{ $coupon->value }}</p>
                                    </td>
                                    @else
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $coupon->value }}%</p>
                                    </td>
                                    @endif
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $coupon->cart_value }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ route('admin.editCoupon',['couponId' => $coupon->id]) }}"><span
                                                class="m-3"><i class="fas fa-edit"></i></span>
                                            <a>
                                                <a href="#"
                                                    onclick="confirm('Are you sure,You want to delete this coupon?') || event.stopImmediatePropagation();"
                                                    wire:click='deleteCoupon({{ $coupon->id }})'><span class="m-3"><i
                                                            class="fas fa-trash"></i></i></span>
                                                    <a>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $coupon->expiry_date }}</p>
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
<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component {
    public function render() {
        $allOrders = Order::all( 'total', 'status', 'created_at' );

        $totalSale    = $allOrders->where( 'status', 'delivered' )->count( 'total' );
        $totalRevenue = $allOrders->where( 'status', 'delivered' )->sum( 'total' );

        $todaySale = $allOrders->where( 'status', 'delivered' )
            ->where( 'created_at', '>', Carbon::today() )->count( 'total' );
        $todayRevenue = $allOrders->where( 'status', 'delivered' )
            ->where( 'created_at', '>', Carbon::today() )->sum( 'total' );
        $todayOrder       = $allOrders->where( 'created_at', '>', Carbon::today() )->count( 'created_at' );
        $todayOrderAmount = $allOrders->where( 'created_at', '>', Carbon::today() )->sum( 'total' );

        return view( 'livewire.admin.dashboard', [
            'totalSale'        => $totalSale,
            'totalRevenue'     => $totalRevenue,
            'todaySale'        => $todaySale,
            'todayRevenue'     => $todayRevenue,
            'todayOrder'       => $todayOrder,
            'todayOrderAmount' => $todayOrderAmount,
        ] )->layout( 'layouts.base' );
    }
}

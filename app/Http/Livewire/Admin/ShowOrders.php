<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class ShowOrders extends Component {
    public $pageSize = 20;
    public $search;

    public function updateOrderStatus($orderId, $status) {
        $order         = Order::find($orderId);
        $order->status = $status;

        if ($status === 'delivered') {
            $order->delivered_date = Carbon::now()->format('Y-m-d H:i:s');
        } elseif ($status === 'canceled') {
            $order->canceled_date = Carbon::now()->format('Y-m-d H:i:s');
        }
        $order->save();
    }

    public function deleteOrder($orderId) {
        $order = Order::find($orderId);
        $order->delete();
    }

    public function render() {
        $searchStr = '%' . $this->search . '%';
        $orders    = Order::where('name', 'LIKE', $searchStr)
            ->orWhere('mobile', 'LIKE', $searchStr)
            ->paginate($this->pageSize);
        return view('livewire.admin.show-orders', [
            'orders' => $orders,
        ])->layout('layouts.base');
    }
}

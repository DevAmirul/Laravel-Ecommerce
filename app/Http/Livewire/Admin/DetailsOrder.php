<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class DetailsOrder extends Component {
    public string $orderId;

    public function mount( $orderId ) {
        $this->orderId = $orderId;
    }

    
    public function render() {
        $order = Order::find( $this->orderId );
        return view( 'livewire.admin.details-order', [
            'order' => $order,
        ] )->layout( 'layouts.base' );
    }
}

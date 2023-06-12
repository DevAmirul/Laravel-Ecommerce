<?php

namespace App\Http\Livewire\InlineComponent;

use Livewire\Component;

class Thankyou extends Component
{
    public function render()
    {
        return <<<'blade'
            @push('title')
            Thank you
            @endpush
            <main id="main" class="main-site">
                <div class="container">
                    <div class="wrap-breadcrumb">
                        <ul>
                            <li class="item-link"><a href="#" class="link">home</a></li>
                            <li class="item-link"><span>Thank You</span></li>
                        </ul>
                    </div>
                </div>
                <div class="container pb-60">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>Thank you for your order</h2>
                            <p>A confirmation email was sent.</p>
                            <a href="/shop" class="btn btn-submit btn-submitx">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </main>
        blade;
    }
}

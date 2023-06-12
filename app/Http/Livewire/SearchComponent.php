<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchComponent extends Component {

    public function render() {
        return <<<'blade'
            <div class="wrap-search center-section">
                <div class="wrap-search-form">
                    <form action="{{ route('search') }}" id="form-search-top" name="form-search-top">
                        <input type="search" name="search" value="" placeholder="Search here...">
                        <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>

        blade;
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Setting;
use Livewire\Component;

class Header extends Component {
    public function render() {
        $categories = Category::where('cat_show_status', 1)->get(['slug', 'name'])->take(8);
        $settings   = Setting::find(1, ['phone','phone2', 'email']);

        return view('livewire.header', [
            'categories' => $categories,
            'settings'   => $settings,
        ]);
    }
}

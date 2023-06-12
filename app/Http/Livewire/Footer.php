<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class Footer extends Component {
    public function render() {
        $settings = Setting::find(1, ['copy_right']);

        return view('livewire.footer', [
            'settings' => $settings,
        ]);
    }
}

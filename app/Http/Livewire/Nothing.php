<?php

namespace App\Http\Livewire;

use Hash;
use Livewire\Component;

class Nothing extends Component {
    public string $string;

    public function makePass() {
        return (isset($this->string)) ? Hash::make($this->string) : '*****' ;
    }

    public function render() {
        return view( 'livewire.nothing',[
            'pass'=> $this->makePass(),
        ] );
    }
}

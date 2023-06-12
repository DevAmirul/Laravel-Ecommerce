<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use App\Models\Setting;
use Livewire\Component;

class SiteSettings extends Component {
    // public $image;
    public string $email;
    public string $phone;
    public string $phone2;
    public string $address;
    public string $map;
    public string $twitter;
    public string $facebook;
    public string $instagram;
    public string $youtube;
    public string $copyRight;
    public $saleDatePick;
    public $saleDateStatus;
    public $s_cost_outside_dhaka;
    public $s_cost_inside_dhaka;

    public function mount() {
        $settings = Setting::find( 1 );

        if ( $settings ) {
            $this->email                = $settings->email;
            $this->phone                = $settings->phone;
            $this->phone2               = $settings->phone2;
            $this->address              = $settings->address;
            $this->map                  = $settings->map;
            $this->twitter              = $settings->twitter;
            $this->facebook             = $settings->facebook;
            $this->instagram            = $settings->instagram;
            $this->youtube              = $settings->youtube;
            $this->copyRight            = $settings->copy_right;
            $this->s_cost_outside_dhaka = $settings->s_cost_outside_dhaka;
            $this->s_cost_inside_dhaka  = $settings->s_cost_inside_dhaka;
        }

        $sale                 = Sale::find( 1 );
        $this->saleDatePick   = $sale->sale_date;
        $this->saleDateStatus = $sale->status;
    }

    protected $rules = [
        'email'     => 'required|email',
        'phone'     => 'required|numeric',
        'phone2'    => 'required|numeric',
        'address'   => 'required',
        'map'       => 'required',
        'twitter'   => 'required',
        'facebook'  => 'required',
        'instagram' => 'required',
        'youtube'   => 'required',
        'copyRight' => 'required',
    ];

    public function updated( $propertyName ) {
        $this->validateOnly( $propertyName );
    }

    public function siteSettings() {
        $this->validate();

        $settings = Setting::find( 1 );
        if ( !$settings ) {
            $settings = new Setting();
        }
        $settings->email                = $this->email;
        $settings->phone                = $this->phone;
        $settings->phone2               = $this->phone2;
        $settings->address              = $this->address;
        $settings->map                  = $this->map;
        $settings->twitter              = $this->twitter;
        $settings->facebook             = $this->facebook;
        $settings->instagram            = $this->instagram;
        $settings->youtube              = $this->youtube;
        $settings->copy_right           = $this->copyRight;
        $settings->s_cost_outside_dhaka = $this->s_cost_outside_dhaka;
        $settings->s_cost_inside_dhaka  = $this->s_cost_inside_dhaka;
        $settings->save();
    }

    public function update() {
        $sale            = Sale::find( 1 );
        $sale->sale_date = $this->saleDatePick;
        $sale->status    = $this->saleDateStatus;
        $sale->save();
    }

    public function render() {
        return view( 'livewire.admin.site-settings' )->layout( 'layouts.base' );
    }
}

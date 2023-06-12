<?php

namespace App\Http\Livewire\LiveWireTraits;

use Illuminate\Support\Facades\File;

trait DeletePhotoTrait {
    public function deletePhoto( $image = null, $images = null ) {

        if ( $image ) {
            if ( File::exists( public_path( 'assets/images/products/' . $image ) ) ) {
                File::delete( public_path( 'assets/images/products/' . $image ) );
            }
        }

        if ( $images ) {
            $images = explode( ',', $images );
            foreach ( $images as $img ) {
                if ( File::exists( public_path( 'assets/images/products/' . $img ) ) ) {
                    File::delete( public_path( 'assets/images/products/' . $img ) );
                }
            }
        }
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact as ModelsContact;
use Livewire\Component;

class Contact extends Component {
    public int $pageSize = 12;

    public function render() {
        $contacts = ModelsContact::paginate( $this->pageSize );
        return view( 'livewire.admin.contact', [
            'contacts' => $contacts,
        ] )->layout( 'layouts.base' );
    }
}

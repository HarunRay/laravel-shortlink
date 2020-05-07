<?php

namespace App\Http\Livewire\Code;

use App\CodeLink;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'linkAdded'
    ];

    public function linkAdded( $linkId )
    {
        session()->flash( 'message', 'Your shortlink has been created' );
    }

    public function render()
    {
        return view( 'livewire.code.index', [
            'links' => CodeLink::latest()->paginate( 25 ),
        ] );
    }
}

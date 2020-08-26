<?php

namespace App\Http\Livewire\Code;

use App\CodeLink;
use Livewire\Component;

class Create extends Component
{
    public $link;
    public $private;

    public function addLink()
    {
        $this->validate( [
            'link'    => 'required|url',
            'private' => 'boolean',
        ] );

        $link = ( new CodeLink() )->generateLink( $this->link, auth()->id(), $this->private );
        $this->emit( 'linkAdded', $link->id );

        $this->link = '';
    }

    public function render()
    {
        return view( 'livewire.code.create' );
    }
}

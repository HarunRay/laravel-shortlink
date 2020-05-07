<?php

namespace App\Http\Livewire\Code;

use Livewire\Component;

class Single extends Component
{
    public $link;

    public function mount( $link )
    {
        $this->link = $link;
    }

    public function render()
    {
        return view( 'livewire.code.single' );
    }
}

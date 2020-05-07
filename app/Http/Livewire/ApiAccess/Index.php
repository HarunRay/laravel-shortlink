<?php

namespace App\Http\Livewire\ApiAccess;

use App\ApiAccess;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'accessCreated',
        'accessRevoked',
    ];

    public function accessCreated( $name, $token )
    {
        session()->flash( 'token', $token );
    }

    public function render()
    {
        return view( 'livewire.api-access.index', [
            'accesses' => ApiAccess::where('user_id', auth()->id())->paginate(25)
        ] );
    }
}

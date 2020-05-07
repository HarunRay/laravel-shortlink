<?php

namespace App\Http\Livewire\ApiAccess;

use App\ApiAccess;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public function createAccess()
    {
        $this->validate( [
            'name' => 'string|required|max:256',
        ] );

        $user      = auth()->user();
        $token     = $user->createToken( Str::kebab( $this->name ) );
        $textToken = $token->plainTextToken;

        $first      = Str::substr( $textToken, 0, 10 );
        $last       = Str::substr( $textToken, - 10, 10 );
        $api_access = ApiAccess::create( [
            'user_id' => $user->id,
            'name'    => $this->name,
            'preview' => $first . '********************' . $last,
        ] );

        $this->emit( 'accessCreated', $this->name, $textToken );

        $this->name = '';
    }

    public function render()
    {
        return view( 'livewire.api-access.create' );
    }
}

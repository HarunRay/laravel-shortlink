<?php

namespace App;

use Bijective\BijectiveTranslator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class CodeLink extends Model
{
    protected $fillable = [
        'user_id',
        'serial',
        'code',
        'link',
    ];

    public static $bijective_alphabets = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    public function generateLink( $link, int $userId = null )
    {
        $serial = 0;

        if ( $last = $this->latest()->first() ) {
            $serial = $last->serial;
        }

        $routes    = collect( Route::getRoutes()->get() )->pluck( 'uri' )->toArray();
        $bijective = new BijectiveTranslator( static::$bijective_alphabets );


        do {
            $serial ++;
            $code = $bijective->encode( $serial );
        } while (
            in_array( $code, $routes ) ||
            $this->where( 'code', $code )->orWhere( 'serial', $serial )->first()
        );

        return $this->create(
            [
                'user_id' => $userId ?? auth()->id(),
                'code'    => $code,
                'serial'  => $serial,
                'link'    => $link,
            ]
        );
    }

    public function user()
    {
        return $this->belongsTo( User::class );
    }
}

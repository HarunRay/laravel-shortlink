<?php

namespace App;

use Bijective\BijectiveTranslator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class CodeLink extends Model
{
    protected $fillable = [
        'user_id',
        'serial',
        'code',
        'link',
        'private',
    ];

    protected $casts = [
        'private' => 'boolean',
    ];

    public static $bijective_alphabets = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    public function generateLink( $link, int $userId = null, bool $private = false )
    {
        $serial = 0;

        if ( $last = $this->latest()->first() ) {
            $serial = $last->serial;
        }

        $routes      = collect( Route::getRoutes() )->pluck( 'uri' )->unique();
        $routePrefix = $routes->map( function ( $value ) {
            $value = explode( '/', $value );

            return $value[0];
        } )->filter()->unique();

        $bijective = new BijectiveTranslator( static::$bijective_alphabets );

        do {
            $serial ++;
            $code = $bijective->encode( $serial );
        } while (
            in_array( $code, $routes->toArray() ) ||
            in_array( $code, $routePrefix->toArray() ) ||
            $this->where( 'code', $code )->orWhere( 'serial', $serial )->first()
        );
        $url = $this->create(
            [
                'user_id' => $userId ?? auth()->id(),
                'code'    => $code,
                'serial'  => $serial,
                'link'    => $link,
                'private' => $private,
            ]
        );

        if ( $private ) {
            $str   = Str::random( 10 );
            $token = [
                'token' => Hash::make( $str ),
            ];
            $url->secret()->create( $token );
            $url->code .= '/' . $str;
            $url->link .= '/' . $str;
        }

        return $url;
    }

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function secret()
    {
        return $this->hasOne( CodeLinkSecret::class );
    }
}

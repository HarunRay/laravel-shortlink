<?php

namespace App\Http\Controllers;

use App\CodeLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CodeLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $code
     *
     * @return RedirectResponse
     */
    public function index( $code, $token )
    {
        $link = CodeLink::where( 'code', $code )->first();
        if ( $link ) {
            if ( $link->private ) {
//                return Hash::check( $token, $link->secret->token );
                if ( ( ! $token || ! Hash::check( $token, $link->secret->token ) ) ) {
                    return abort( 403, 'Invalid URL' );
                }
            }

            return redirect()->away( $link->link, 301 );

        }

        return redirect()->route( 'home' );
    }
}

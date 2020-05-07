<?php

namespace App\Http\Controllers;

use App\CodeLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CodeLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $code
     *
     * @return RedirectResponse
     */
    public function index( $code )
    {
        $link = CodeLink::where( 'code', $code )->first();
        if ( $link ) {
            return redirect()->away( $link->link, 301 );
        }

        return redirect()->route( 'home' );
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\CodeLink;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store( Request $request )
    {
        $validate = Validator::make( $request->all(), [
            'link'    => 'required|url',
            'private' => 'boolean',
        ] );

        if ( $validate->fails() ) {
            return response()->json( [ 'errors' => $validate->errors() ], 422 );
        }

//        return $request->all();

        $link = ( new CodeLink() )->generateLink( $request->link, $request->user()->id, $request->boolean( 'private' ) );
        if ( $link ) {
            $shortlink_full = route( 'code.link', [ 'code' => $link->code ] );
            $shortlink      = Str::replaceFirst( 'https://', '', $shortlink_full );
            $shortlink      = Str::replaceFirst( 'http://', '', $shortlink );

            return response()->json( [
                'message'        => 'Shortlink generated successfully',
                'link'           => $request->link,
                'code'           => $link->code,
                'shortlink'      => $shortlink,
                'shortlink_full' => $shortlink_full
            ], 201 );
        }

        return response()->json( [ 'error' => [ 'Couldn\'t generate shortlink' ] ], 400 );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        //
    }
}

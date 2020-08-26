<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrivateToCodeLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( 'code_links', function ( Blueprint $table ) {
            $table->boolean( 'private' )->default( false );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( 'code_links', function ( Blueprint $table ) {
            $table->dropColumn( 'private' );
        } );
    }
}

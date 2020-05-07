<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'code_links', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'user_id' )->constrained();
            $table->unsignedBigInteger( 'serial' )->unique()->index();
            $table->string( 'code' )->unique()->index();
            $table->text( 'link' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'code_links' );
    }
}

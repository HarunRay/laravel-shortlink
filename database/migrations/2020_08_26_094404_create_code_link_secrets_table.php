<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeLinkSecretsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'code_link_secrets', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'code_link_id' )->constrained()->cascadeOnDelete();
            $table->string( 'token' );
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
        Schema::dropIfExists( 'code_link_secrets' );
    }
}

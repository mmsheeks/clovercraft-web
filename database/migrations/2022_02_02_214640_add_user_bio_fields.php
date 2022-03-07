<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserBioFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( 'users', function( Blueprint $table ) {
            $table->boolean( 'listed' )->default( false );
            $table->string( 'pronouns' )->nullable();
            $table->string( 'timezone' )->nullable();
            $table->date( 'birthday' )->nullable();
            $table->longText( 'bio' )->nullable();
            $table->string( 'citizenship' )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersDropExtras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->dropColumn([ 'oauth_token', 'oauth_refresh_token', 'oauth_expires' ] );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( 'users', function( Blueprint $table ) {
            $table->string(  'oauth_token' );
            $table->string(  'oauth_refresh_token' );
            $table->datetime( 'oauth_expires' );
        });
    }
}

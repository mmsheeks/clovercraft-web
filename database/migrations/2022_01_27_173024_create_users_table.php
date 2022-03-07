<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string(  'discord_id' );
            $table->string(  'nickname' );
            $table->string(  'name' );
            $table->string(  'email' );
            $table->string(  'avatar' );
            $table->string(  'oauth_token' );
            $table->string(  'oauth_refresh_token' );
            $table->datetime( 'oauth_expires' );

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

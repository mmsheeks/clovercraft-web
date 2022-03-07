<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesPostsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'attachments', function( Blueprint $table ) {
            $table->id();

            $table->string( 'title' );
            $table->string( 'path' );
            $table->string( 'alt_text' )->nullable();
            $table->foreignId( 'user_id' )->constrained( 'users' );

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create( 'guides', function( Blueprint $table ) {
            $table->id();

            $table->string( 'title' );
            $table->string( 'description' )->nullable();
            $table->integer( 'parent_id' )->nullable();
            $table->integer( 'weight' )->default( 0 );
            $table->string( 'status' )->default( 'draft' );
            $table->longText( 'content' )->nullable();

            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create( 'books', function( Blueprint $table ) {
            $table->id();

            $table->string( 'title' );
            $table->string( 'description' )->nullable();
            $table->string( 'status' )->default( 'draft' );

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create( 'pages', function (Blueprint $table) {
            $table->id();

            $table->string( 'title' );
            $table->integer( 'weight' )->default( 0 );
            $table->foreignId( 'book_id' )->constrained( 'books' );
            $table->longText( 'content' )->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create( 'books_users', function( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'book_id' )->constrained( 'books' );
            $table->foreignId( 'user_id' )->constrained( 'users' );
            $table->string( 'role' )->default( 'editor' );
        });

        Schema::create( 'posts', function( Blueprint $table ) {
            $table->id();

            $table->string( 'title' );
            $table->string( 'status' )->default( 'draft' );
            $table->string( 'tags' )->nullable();
            $table->foreignId( 'user_id' )->constrained( 'users' );
            $table->longText( 'content' )->nullable();
            $table->date( 'published_on' );

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create( 'shops', function( Blueprint $table ) {
            $table->id();

            $table->string( 'name' );
            $table->string( 'description' )->nullable();
            $table->longText( 'details' )->nullable();
            $table->string( 'city' )->nullable();
            $table->integer( 'location_x' );
            $table->integer( 'location_y' );
            $table->integer( 'location_z' );
            $table->foreignId( 'user_id' )->constrained( 'users' );

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
        
    }
}

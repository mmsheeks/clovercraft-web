<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string( 'name' );
            $table->string( 'slug' );
            $table->string( 'icon' );

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('item_shop', function (Blueprint $table) {
            $table->foreignId( 'mcitem_id' )->constrained( 'items' );
            $table->foreignId( 'shop_id' )->constrained( 'shops' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_shop');
        Schema::dropIfExists('items');
    }
}

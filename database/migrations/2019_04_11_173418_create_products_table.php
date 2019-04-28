<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('detail');
            $table->integer('price');
            $table->integer('stock');
            $table->integer('discount');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
        });

        // create foreign key product id in table reviews
        Schema::table('reviews', function($table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });

        // create foreign key user id in table products
        // Schema::table('products', function($table) {
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('products', function (Blueprint $table) {
        //     $table->dropForeign('products_user_id_foreign');
        // });
        // Schema::dropIfExists('users');
    }
}

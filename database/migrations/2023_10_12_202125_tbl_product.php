<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('id');
            $table->String('product_id')->unique();
            $table->integer('category_id');
            $table->string('product_name');
            $table->string('product_image');
            $table->string('product_price');
            $table->integer('product_qty');
            $table->string('product_des');
            $table->text('product_content');
            $table->text('product_slug');
            $table->string('product_tags');
            $table->integer('product_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product');
    }
};

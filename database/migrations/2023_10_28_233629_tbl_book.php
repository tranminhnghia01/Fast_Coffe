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
        Schema::create('tbl_book', function (Blueprint $table) {
            $table->increments('book_id');
            $table->String('book_code');
            $table->integer('shipping_id');
            $table->integer('payment_id');
            $table->integer('coupon_id');
            $table->String('book_address');
            $table->date('book_date');
            $table->time('book_time_start');
            $table->time('book_time_end');
            $table->time('book_time_total');
            $table->String('book_total');
            $table->integer('book_status');
            $table->text('book_notes');
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
        Schema::dropIfExists('tbl_book');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('image_url');
            $table->float('price', 10, 2);
            $table->float('price_child', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('holiday_open')->default(0);
            $table->boolean('weekend_open')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('discount_promotion')->nullable();
            $table->integer('day_use')->default(1);
            $table->boolean('not_refund')->default(0);
            $table->boolean('pet_allow')->default(0);
            $table->bigInteger('category_id')->unsigned()->default(1);
            $table->foreign('category_id')
                ->references('id')
                ->on('voucher_categories')
                ->onDelete('cascade');
            $table->bigInteger('hotel_id')->unsigned()->default(1);

            $table->foreign('hotel_id')
                ->references('id')
                ->on('hotels')
                ->onDelete('cascade');
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
        Schema::dropIfExists('vouchers');
    }
}
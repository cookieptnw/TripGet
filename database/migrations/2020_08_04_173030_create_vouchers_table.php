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
            $table->float('price', 10, 2);
            $table->float('price_child', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('holiday_open');
            $table->boolean('weekend_open');
            $table->integer('discount');
            $table->integer('discount_promotion');
            $table->integer('day_use');
            $table->boolean('not_refund');
            $table->boolean('pet_allow');
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
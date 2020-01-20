<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('subscription_id');
            $table->string('status');
            $table->integer('total');
            $table->date('paid_date');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('subscription_id')->references('id')->on('subscription')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}

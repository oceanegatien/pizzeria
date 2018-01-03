<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzaOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_order', function (Blueprint $table) {
            $table->string('size');
            $table->timestamps();
            $table->integer('order_id')
                  ->foreign('order_id')
                  ->references('order_id')->on('orders');
            $table->integer('pizza_id')
                  ->foreign('pizza_id')
                  ->references('pizza_id')->on('pizzas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_order');
    }
}

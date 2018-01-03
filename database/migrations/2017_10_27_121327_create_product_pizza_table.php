<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPizzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_pizza', function (Blueprint $table) {
          $table->integer('pizza_id')
                ->foreign('pizza_id')
                ->references('pizza_id')->on('pizzas');
          $table->integer('product_id')
                ->foreign('product_id')
                ->references('product_id')->on('products');
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
        Schema::dropIfExists('product_pizza');
    }
}

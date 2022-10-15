<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderId');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
            $table->integer('productId');
            $table->string('sizeName')->nullable();
            $table->integer('quantity');
            $table->double('unitPrice',10,2);
            $table->double('totalPrice',10,2);
            $table->text('productNote')->nullable();
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
        Schema::dropIfExists('order_items');
    }
}

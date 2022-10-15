<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('company')->nullable();
            $table->integer('cityId');
            $table->string('cityName');
            $table->text('streetAddress');
            $table->text('floor')->nullable();
            $table->string('deliveryType');
            $table->string('orderType');
            $table->dateTime('deliveryTime')->nullable();;
            $table->dateTime('arrivalTime')->nullable();;
            $table->integer('postCode');
            $table->string('postArea');
            $table->string('phone');
            $table->string('email');
            $table->string('orderNote')->nullable();
            $table->string('paymentId')->nullable();
            $table->string('referenceNumber')->nullable();
            $table->string('cardBrand')->nullable();
            $table->string('last4')->nullable();
            $table->string('paymentType');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->double('totalPrice',10,2);
            $table->integer('seenByAdmin')->default(0)->comment('0 = unseen, 1 = seen');
            $table->string('status')->default('pending');
            $table->integer('delivery_man_id')->nullable();
            $table->dateTime('delivery_man_assign_time')->nullable();
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
        Schema::dropIfExists('orders');
    }
}

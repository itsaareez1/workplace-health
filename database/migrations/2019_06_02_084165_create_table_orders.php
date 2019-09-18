<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',20);
            $table->integer('sub_total')->nullable();
            $table->integer('shipping_charges')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total')->nullable();
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('delivery_id')->nullable();
            $table->foreign('delivery_id')->references('id')->on('shipping');
            $table->integer('cart_id')->nullable();
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->string('status', 25);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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

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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->string('name');
            $table->text('address');
            $table->text('address2')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->integer('quantity');
            $table->string('payment_method')->nullable();
            $table->string('payment_number')->nullable();
            $table->string('order_number');
            $table->float('sub_total')->nullable();
            $table->float('coupon')->nullable();
            $table->float('total_amount')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('order_status');
            $table->string('country')->nullable();
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->string('post_code')->nullable();
            $table->string('status');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('SET NULL');
            $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('SET NULL');
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

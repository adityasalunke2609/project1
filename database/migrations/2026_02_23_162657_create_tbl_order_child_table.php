<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_order_child', function (Blueprint $table) {
            $table->integer('order_child_id')->autoIncrement();
            $table->integer('order_child_master_id');
            $table->integer('order_child_user_id');
            $table->integer('order_child_product_id');
            $table->string('order_child_cart_price');
            $table->string('order_child_cart_quantity');
            $table->string('order_child_cart_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_order_child');
    }
};

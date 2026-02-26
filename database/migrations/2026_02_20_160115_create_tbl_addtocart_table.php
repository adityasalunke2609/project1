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
        Schema::create('tbl_addtocart', function (Blueprint $table) {
            $table->integer('cart_id')->autoIncrement();
            $table->string('product_id');
            $table->string('cart_price');
            $table->string('cart_quantity');
            $table->string('cart_total');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_addtocart');
    }
};

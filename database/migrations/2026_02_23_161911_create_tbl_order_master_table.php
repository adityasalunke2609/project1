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
        Schema::create('tbl_order_master', function (Blueprint $table) {
            $table->integer('order_master_id')->autoIncrement();
            $table->integer('order_master_user_id');
            $table->string('order_master_total');
            $table->string('order_master_payment_status')->default('pending');
            $table->string('order_master_payment_mode')->default('cash on delivery');
            $table->string('order_master_status')->default('pending');
            $table->string('order_master_address')->nullable();
            $table->string('order_master_pincode')->nullable();
            $table->string('order_master_receiver_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_order_master');
    }
};

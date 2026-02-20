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
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->integer('product_id')->autoIncrement();
            $table->string('product_name');
            $table->string('product_hsncode');
            $table->string('product_weight');
            $table->string('product_caterogy_id');
            $table->string('product_subcaterogy_id');
            $table->string('product_tax');
            $table->string('product_unit');
            $table->string('product_bar_code');
            $table->string('product_qrcode');
            $table->string('product_unique_code');
            $table->string('product_mrp');
            $table->string('product_sale');
            $table->string('product_purchase');
            $table->string('product_wholesale');
            $table->string('product_distributor');
            $table->string('product_op_qty');
            $table->string('product_op_value');
            $table->string('product_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};

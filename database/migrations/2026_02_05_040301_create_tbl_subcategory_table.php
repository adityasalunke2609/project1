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
        Schema::create('tbl_subcategory', function (Blueprint $table) {
           $table->integer("subcategory_id")->autoIncrement();
            $table->string("category_id");
            $table->string("subcategory_name");
            $table->string("subcategory_image");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_subcategory');
    }
};

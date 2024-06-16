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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('category_id');
            $table->string('subcategory_id');
            $table->string('tag_name');
            $table->integer('current_stock');
            $table->string('sku')->unique();
            $table->string('product_image');
            $table->string('brand_id');
            $table->string('color_id');
            $table->string('product_price');
            $table->string('selling_price');
            $table->string('shipping_price');
            $table->string('preorder_description');
            $table->string('short_description');
            $table->string('long_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

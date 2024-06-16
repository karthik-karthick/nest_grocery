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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('user_id');
            $table->string('product_id');
            $table->string('product_name');
            $table->string('sub_total');
            $table->string('quantity');
            $table->string('shiping');
            $table->string('grandtotal');
            $table->string('payment_method');
            $table->string('payment_status')->default('Pending');
            $table->string('address_id');
            $table->string('status')->default('Pending');
            $table->string('reason')->nullable();
            $table->string('custom_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};

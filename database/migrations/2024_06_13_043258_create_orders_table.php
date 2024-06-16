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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('user_id');
            $table->string('product_id');
            $table->string('subtotal');
            $table->string('shiping');
            $table->string('quantity');
            $table->string('grandtotal');
            $table->string('payment_method');
            $table->string('payment_id')->nullable();
            $table->string('razorpay_id')->nullable();
            $table->string('payment_status')->default('Pending');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

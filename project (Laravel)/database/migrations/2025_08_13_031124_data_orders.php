<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("data_orders", function (Blueprint $table) {
            $table->id("id");
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->string('name')->default('name');
            $table->string('email')->default('name');
            $table->string('address_line')->default('name');
            $table->string('phone')->nullable();
            $table->string('message')->default('Terimakasih! Pesanan Anda sedang kami proses untuk packing. mohon tunggu proses packing ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

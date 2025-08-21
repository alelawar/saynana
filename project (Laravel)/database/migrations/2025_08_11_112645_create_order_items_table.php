<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('qty');
            $table->bigInteger('price')->unsigned();
            $table->timestamps();

            $table->unique(['order_id', 'product_id']); // agar satu produk hanya 1 record
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};

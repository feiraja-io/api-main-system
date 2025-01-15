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
            $table->integer('store_id')->unsigned();
            $table->string('name');
            $table->integer('price_in_cents');
            $table->string('item_unity');
            $table->timestamp('harvest_date');
            $table->timestamp('expiration_date');
            $table->json('images');
            $table->string('notes');
            $table->string('stock_by');
            $table->integer('stock_quantity');
            $table->boolean('in_marketplace');
            $table->string('description');
            $table->timestamps();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
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

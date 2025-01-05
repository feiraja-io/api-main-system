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
            $table->string('description');
            $table->string('responsible');
            $table->string('track_stock_by');
            $table->string('charge_for');
            $table->string('item_unity');
            $table->integer('quantity');
            $table->boolean('notify_when_is_out');
            $table->integer('notify_when_storage_have');
            $table->boolean('product_in_store');
            $table->string('additional_value');
            $table->string('selling_value_cents');
            $table->boolean('highlight');
            $table->integer('limit');
            //Create category table and add n to n relation
            $table->integer('category');
            //separate in diferent model and table: Package
            $table->string('package_name');
            $table->integer('package_price_cents');
            $table->integer('package_quantity');
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

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
        Schema::create('store_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_id');
            $table->string('store_id');
            $table->string('type');
            $table->timestamps();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_files');
    }
};

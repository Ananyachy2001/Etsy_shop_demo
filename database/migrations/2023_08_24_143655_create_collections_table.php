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
        Schema::dropIfExists('collections');
        Schema::create('collections', function (Blueprint $table) {
            $table->id('collection_id'); // Primary Key
            $table->unsignedBigInteger('shop_id'); // Foreign Key referencing Shop Table
            $table->string('collection_name');
            $table->string('collection_image'); // Image path or URL
            $table->text('collection_description');
            $table->string('collection_short_name');
            $table->string('collection_long_name');
            $table->timestamps();
        
            // Define foreign key constraint
            $table->foreign('shop_id')->references('shop_id')->on('shops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};

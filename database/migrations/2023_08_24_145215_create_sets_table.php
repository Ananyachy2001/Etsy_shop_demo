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
        Schema::create('sets', function (Blueprint $table) {
            $table->id('set_id'); // Primary Key
            $table->unsignedBigInteger('collection_id'); // Foreign Key referencing Collection Table
            $table->unsignedBigInteger('listing_id'); // Foreign Key referencing Listing Table
            $table->string('set_name');
            $table->string('set_image'); // Image path or URL
            $table->text('set_description');
            $table->string('set_short_name');
            $table->string('set_long_name');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('collection_id')->references('collection_id')->on('collections')->onDelete('cascade');
            $table->foreign('listing_id')->references('listing_id')->on('listings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sets');
    }
};

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
        Schema::create('files', function (Blueprint $table) {
            $table->id('file_id'); // Primary Key
            $table->unsignedBigInteger('set_id'); // Foreign Key referencing Set Table
            $table->unsignedBigInteger('collection_id'); // Foreign Key referencing Collection Table
            $table->string('file_name');
            $table->string('file_type');
            $table->string('file_path');
            $table->string('file_preview'); // Image path or URL
            $table->text('file_info');
            $table->string('design_name');
            $table->string('design_variant_short_name');
            $table->string('design_variant_long_name');
            $table->timestamps();
        
            // Define foreign key constraints
            $table->foreign('set_id')->references('set_id')->on('sets')->onDelete('cascade');
            $table->foreign('collection_id')->references('collection_id')->on('collections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};

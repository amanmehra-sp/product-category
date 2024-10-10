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
        Schema::create('subcats', function (Blueprint $table) {
            $table->id();
            // Define the foreign key columns
            $table->unsignedBigInteger('category_id');  
            // Define foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); 
            $table->string('title');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcats');
    }
};

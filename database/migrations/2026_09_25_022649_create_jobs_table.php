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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->nullable();
            $table->string('company')->nullable();
            $table->string('location');
            $table->text('description')->nullable();
            $table->text('url')->unique();
            $table->foreignId('source_id')->constrained('sources')->onDelete('cascade');
            $table->jsonb('extracted_data')->nullable();#for future use (AI)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

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
        Schema::create('quiz_item_options', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            $table->foreignId('quiz_item_id')->constrained('quiz_item')->onDelete('cascade');
            $table->integer('order')->default(1);
            $table->string('value', 100)->default('a');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_item_options');
    }
};

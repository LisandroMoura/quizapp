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
        Schema::create('quiz', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            $table->string('description', 191)->nullable();
            $table->enum('type', ['1', '2', '3'])->default('1')->comment('1- Normal, 2 - Avaliar, 3 - Custom');
            $table->longText('body')->nullable();
            $table->integer('number_options')->default(5);
            $table->enum('status', ['1', '9'])->default('1')->comment('1 - ativo, 9 - inativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz');
    }
};

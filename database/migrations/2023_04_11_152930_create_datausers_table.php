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
        Schema::create('datausers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iddatauser');
            $table->tinyInteger('age')->nullable();
            $table->string('city', 50)->nullable();
            $table->string('country', 20)->nullable();
            $table->string('cp', 15)->nullable();
            $table->string('gender')->nullable();
            $table->binary('img')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datausers');
    }
};

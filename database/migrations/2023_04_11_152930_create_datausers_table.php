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
            $table->unsignedBigInteger('id_datauser');
            $table->string('email')->unique;
            $table->tinyInteger('age_user')->nullable();
            $table->string('city_user', 50)->nullable();
            $table->string('country_user', 20)->nullable();
            $table->string('cp_user', 15)->nullable();
            $table->string('gender_user')->nullable();
            $table->binary('img_user')->nullable();
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

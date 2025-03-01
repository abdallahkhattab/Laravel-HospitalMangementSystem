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
        Schema::create('doctor_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name');
            $table->string('appointments')->nullable();
            $table->unique(['doctor_id', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_translations');
    }
};

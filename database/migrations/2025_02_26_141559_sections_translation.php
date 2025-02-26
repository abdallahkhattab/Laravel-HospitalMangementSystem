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
        Schema::create('sections_translations',function(Blueprint $table){
            $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');

            $table->string('locale')->index();
     
            // Foreign key to the main model
          //  $table->unsignedInteger('section_id');
            $table->unique(['section_id', 'locale']);
     
     
            // Actual fields you want to translate
            $table->string('name');
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('sections_translations');

    }
};

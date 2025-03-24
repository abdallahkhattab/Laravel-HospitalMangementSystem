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
        Schema::table('rays', function (Blueprint $table) {
            $table->foreignId('employee_id')->nullable()->references('id')->on('ray_employees')->onDelete('cascade');
            $table->longText('description_employee')->nullable();
            $table->tinyInteger('case')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rays', function (Blueprint $table) {
            $table->dropIfExists(['employee_id','description_employee','case']);
        });
    }
};

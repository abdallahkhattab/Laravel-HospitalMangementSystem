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
        Schema::table('receipt_accounts', function (Blueprint $table) {
            if (!Schema::hasColumn('receipt_accounts', 'created_at')) {
                $table->timestamps(); // Adds created_at and updated_at
            }
        });

    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receipt_accounts', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']); // Drops timestamps properly
        });
    }
};

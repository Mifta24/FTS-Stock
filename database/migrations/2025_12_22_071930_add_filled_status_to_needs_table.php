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
        Schema::table('needs', function (Blueprint $table) {
            // Modify status column to include 'filled'
            $table->string('status')->default('pending')->change();
        });

        // Update existing data if needed - SQLite doesn't support MODIFY COLUMN with ENUM
        // So we just ensure the column accepts 'filled' as a string value
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('needs', function (Blueprint $table) {
            // No need to revert as we're just allowing more string values
        });
    }
};

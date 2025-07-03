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
       Schema::table('membership_attendances', function (Blueprint $table) {
            // Remove old timestamp column
            $table->dropColumn('recorded_at');

            // Add Laravel-compatible timestamps
            $table->timestamps(); // adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('membership_attendances', function (Blueprint $table) {
            // Rollback: drop Laravel timestamps and restore recorded_at
            $table->dropTimestamps();
            $table->timestamp('recorded_at')->nullable();
        });
    }
};

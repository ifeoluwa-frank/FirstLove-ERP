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
        Schema::table('bacentas', function (Blueprint $table) {
            $table->string('username')->unique()->after('location');
            $table->string('password')->after('username'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bacentas', function (Blueprint $table) {
            $table->dropColumn(['username', 'password']);
        });
    }
};

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
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['member_id']); // Drop the foreign key constraint
            $table->dropColumn('member_id'); // Remove the single member column
            $table->json('member_ids')->after('bacenta_id'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->dropColumn('member_ids');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBusingAttendanceAddTimestamps extends Migration
{
    public function up()
    {
        Schema::table('busing_attendances', function (Blueprint $table) {
            // Add Laravel default timestamps
            $table->timestamps();

            // Remove recorded_at column
            $table->dropColumn('recorded_at');
        });
    }

    public function down()
    {
        Schema::table('busing_attendances', function (Blueprint $table) {
            // Drop timestamps
            $table->dropTimestamps();

            // Restore recorded_at
            $table->timestamp('recorded_at')->nullable();
        });
    }
}


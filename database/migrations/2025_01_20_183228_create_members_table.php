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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('profile_picture')->nullable();
            $table->date('dob')->nullable();
            $table->string('school')->nullable(); // E.g., school or degree
            $table->string('phone')->unique();
            $table->string('whatsapp')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('bacenta_id')->constrained('bacentas')->onDelete('cascade'); // Foreign key
            $table->date('joined_at')->nullable(); // Date of joining
            $table->date('last_visited_at')->nullable(); // Last visited date
            $table->string('ministry')->nullable(); // Ministry the member belongs to
            $table->boolean('speaks_in_tongues')->default(false);
            $table->boolean('baptized')->default(false);
            $table->boolean('nbs_certified')->default(false); //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

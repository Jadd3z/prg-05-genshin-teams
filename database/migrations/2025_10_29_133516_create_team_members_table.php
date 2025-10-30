<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id('TeamMemberID'); // Primary Key
            $table->unsignedBigInteger('TeamID'); // Foreign Key (FK)
            $table->unsignedBigInteger('CharacterID'); // Foreign Key (FK)
            $table->string('Role');
            $table->timestamps();

            // Define Foreign Key constraints
            $table->foreign('TeamID')->references('TeamID')->on('teams')->onDelete('cascade');
            $table->foreign('CharacterID')->references('CharacterID')->on('characters')->onDelete('cascade');

            // Optional: Create a unique constraint for a character per team
            $table->unique(['TeamID', 'CharacterID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};

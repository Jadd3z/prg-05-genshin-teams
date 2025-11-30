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
        Schema::create('teams', function (Blueprint $table) {
            $table->id('TeamID'); // Primary Key (PK)
            $table->string('TeamName');
            $table->unsignedBigInteger('MainCharacterID')->nullable(); // Foreign Key reference
            $table->unsignedBigInteger('SupportCharacter1ID')->nullable();
            $table->unsignedBigInteger('SupportCharacter2ID')->nullable();
            $table->unsignedBigInteger('SupportCharacter3ID')->nullable();
            $table->string('PrimaryReaction')->nullable();
            $table->timestamps();
            
            // Define Foreign Key Constraints
            $table->foreign('MainCharacterID')->references('CharacterID')->on('characters')->onDelete('cascade');
            $table->foreign('SupportCharacter1ID')->references('CharacterID')->on('characters')->onDelete('set null');
            $table->foreign('SupportCharacter2ID')->references('CharacterID')->on('characters')->onDelete('set null');
            $table->foreign('SupportCharacter3ID')->references('CharacterID')->on('characters')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};

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
        Schema::create('destinataire', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destinataires')->constrained('users');
            $table->foreignId('Courriel')->constrained('courriels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinataire');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('courriels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expediteur_id')->constrained('users'); // Adjust table name if necessary
            $table->string('sujet');
            $table->date('date_du_courrier');
            $table->text('description');
            $table->text('destinataire'); // Use JSON type for storing multiple recipients
            $table->string('categorie');
            $table->string('importance');
            $table->string('urgence');
            $table->text('courrier'); // Changed to text if it can be longer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courriels');
    }
};

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
    Schema::create('entrees', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Lien vers l'utilisateur
        $table->string('titre');                    // Titre de l'entrée
        $table->text('contenu');                    // Contenu de l'entrée
        $table->string('resume')->nullable();      // Résumé (optionnel)
        $table->string('humeur')->nullable();      // Humeur du jour (optionnel)
        $table->boolean('est_publique')->default(false); // Entrée publique ou privée
        $table->string('chemin_image')->nullable(); // Chemin de l'image (optionnel)
        $table->date('date_ecriture')->nullable(); // Date d'écriture (optionnel)

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};

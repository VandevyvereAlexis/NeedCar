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
        Schema::create('vehicules', function (Blueprint $table)
        {
            $table->id();
            $table->string('marque', 25);
            $table->string('modele', 65);
            $table->enum('energie', [
                'Essence',
                'Diesel',
                'Électrique',
                'Hybride',
                'Hybride rechargeable',
                'Hydrogène',
            ]);
            $table->year('annee');
            $table->string('immatriculation', 8)->unique();
            $table->integer('kilometrage');
            $table->date('date_debut_controle');
            $table->date('date_fin_controle');
            $table->enum('nombre_places', [
                '2 places',
                '4 places',
                '5 places',
                '6 places',
                '7 places',
                '8 places',
                '9 places',
                '12 places',
            ]);
            $table->string('image', 100);
            $table->decimal('prix', 5, 2);
            $table->text('description', 2500);

            $table->timestamps();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade');
            $table->foreignId('adresse_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};

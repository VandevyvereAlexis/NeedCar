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
        Schema::create('avis', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedTinyInteger('note');
            $table->text('commentaire', 500);

            $table->timestamps();

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('vehicule_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};

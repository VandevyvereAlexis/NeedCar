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
        Schema::create('messages', function (Blueprint $table)
        {
            $table->id();
            $table->boolean('lu')->default(false);
            $table->text('texte', 2500);

            $table->timestamps();

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('discussion_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};

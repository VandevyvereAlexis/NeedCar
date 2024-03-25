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
        Schema::create('users', function (Blueprint $table)
        {
            $table->id();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('pseudo', 25)->unique();
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->char('numero', 10);
            $table->char('age', 2);
            $table->string('numero_permis', 15)->unique();
            $table->date('date_permis');
            $table->string('pays_permis', 100);
            $table->string('image', 100)->default('default.jpg');


            $table->timestamps();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();

            $table->foreignId('role_id')->default(1)->constrained();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table)
        {
            $table->string('token');
            $table->string('email')->primary();
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table)
        {
            $table->longText('payload');
            $table->string('id')->primary();
            $table->text('user_agent')->nullable();
            $table->integer('last_activity')->index();
            $table->string('ip_address', 45)->nullable();
            $table->foreignId('user_id')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
    }
};

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
        Schema::create('cedente_prestatore', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dati_anagrafici_id');
            $table->unsignedBigInteger('sede_id');
            $table->unsignedBigInteger('stabile_organizzazione_id')->nullable();
            $table->unsignedBigInteger('iscrizione_rea_id')->nullable();
            $table->unsignedBigInteger('contatti_id')->nullable();
            $table->unsignedBigInteger('riferimento_amministrazione_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('dati_anagrafici_id')->references('id')->on('dati_anagrafici')->onDelete('cascade');
            $table->foreign('sede_id')->references('id')->on('sede')->onDelete('cascade');
            $table->foreign('stabile_organizzazione_id')->references('id')->on('stabile_organizzazione')->onDelete('cascade');
            $table->foreign('iscrizione_rea_id')->references('id')->on('iscrizione_rea')->onDelete('cascade');
            $table->foreign('contatti_id')->references('id')->on('contatti')->onDelete('cascade');
            $table->foreign('riferimento_amministrazione_id')->references('id')->on('riferimento_amministrazione')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cedente_prestatore');
    }
};

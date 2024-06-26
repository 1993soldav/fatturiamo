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
        Schema::create('dati_anagrafici', function (Blueprint $table) {
            $table->id();
            $table->string('id_paese');
            $table->string('id_codice');
            $table->string('codice_fiscale')->nullable();
            $table->string('denominazione')->nullable();
            $table->string('nome')->nullable();
            $table->string('cognome')->nullable();
            $table->string('titolo')->nullable();
            $table->string('cod_eori')->nullable();
            $table->string('albo_professionale')->nullable();
            $table->string('provincia_albo')->nullable();
            $table->string('numero_iscrizione_albo')->nullable();
            $table->date('data_iscrizione_albo')->nullable();
            $table->string('regime_fiscale');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('dati_anagrafici');
    }
};

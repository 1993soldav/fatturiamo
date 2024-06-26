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
        Schema::create('iscrizione_rea', function (Blueprint $table) {
            $table->id();
            $table->string('ufficio');
            $table->string('numero_rea');
            $table->decimal('capitale_sociale', 15, 2)->nullable();
            $table->boolean('socio_unico')->nullable();
            $table->boolean('stato_liquidazione');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iscrizione_rea');
    }
};

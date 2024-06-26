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
        Schema::create('stabile_organizzazione', function (Blueprint $table) {
            $table->id();
            $table->string('indirizzo');
            $table->string('numero_civico')->nullable();
            $table->string('cap');
            $table->string('comune');
            $table->string('provincia');
            $table->string('nazione');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::dropIfExists('stabile_organizzazione');
}
};

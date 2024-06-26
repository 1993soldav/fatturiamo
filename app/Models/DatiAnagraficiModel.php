<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatiAnagraficiModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'dati_anagrafici';

    protected $fillable = [
        'id_paese',
        'id_codice',
        'codice_fiscale',
        'denominazione',
        'nome',
        'cognome',
        'titolo',
        'cod_eori',
        'albo_professionale',
        'provincia_albo',
        'numero_iscrizione_albo',
        'data_iscrizione_albo',
        'regime_fiscale',
    ];
}

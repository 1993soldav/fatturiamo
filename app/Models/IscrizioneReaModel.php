<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IscrizioneReaModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'iscrizione_rea';

    protected $fillable = [
        'ufficio',
        'numero_rea',
        'capitale_sociale',
        'socio_unico',
        'stato_liquidazione',
    ];
}

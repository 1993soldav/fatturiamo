<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CedentePrestatoreModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cedente_prestatore';

    protected $fillable = [
        'dati_anagrafici_id',
        'sede_id',
        'stabile_organizzazione_id',
        'iscrizione_rea_id',
        'contatti_id',
        'riferimento_amministrazione_id',
    ];

    public function datiAnagrafici()
    {
        return $this->belongsTo(DatiAnagraficiModel::class);
    }

    public function sede()
    {
        return $this->belongsTo(SedeModel::class);
    }

    public function stabileOrganizzazione()
    {
        return $this->belongsTo(StabileOrganizzazioneModel::class);
    }

    public function iscrizioneRea()
    {
        return $this->belongsTo(IscrizioneReaModel::class);
    }

    public function contatti()
    {
        return $this->belongsTo(ContattiModel::class);
    }

    public function riferimentoAmministrazione()
    {
        return $this->belongsTo(RiferimentoAmministrazioneModel::class);
    }
}

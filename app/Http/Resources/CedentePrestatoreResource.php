<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CedentePrestatoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'dati_anagrafici' => $this->datiAnagrafici,
            'sede' => $this->sede,
            'stabile_organizzazione' => $this->stabileOrganizzazione,
            'iscrizione_rea' => $this->iscrizioneRea,
            'contatti' => $this->contatti,
            'riferimento_amministrazione' => $this->riferimentoAmministrazione,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

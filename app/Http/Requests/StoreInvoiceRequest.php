<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cambiato a true per autorizzare la richiesta
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cedente_prestatore.dati_anagrafici.id_paese' => 'required|string|size:2',
            'cedente_prestatore.dati_anagrafici.id_codice' => 'required|string|max:50',
            'cedente_prestatore.dati_anagrafici.codice_fiscale' => 'nullable|string|size:16',
            'cedente_prestatore.dati_anagrafici.denominazione' => 'nullable|string|max:255',
            'cedente_prestatore.dati_anagrafici.nome' => 'nullable|string|max:255',
            'cedente_prestatore.dati_anagrafici.cognome' => 'nullable|string|max:255',
            'cedente_prestatore.dati_anagrafici.titolo' => 'nullable|string|max:50',
            'cedente_prestatore.dati_anagrafici.cod_eori' => 'nullable|string|max:50',
            'cedente_prestatore.dati_anagrafici.albo_professionale' => 'nullable|string|max:255',
            'cedente_prestatore.dati_anagrafici.provincia_albo' => 'nullable|string|size:2',
            'cedente_prestatore.dati_anagrafici.numero_iscrizione_albo' => 'nullable|string|max:50',
            'cedente_prestatore.dati_anagrafici.data_iscrizione_albo' => 'nullable|date',
            'cedente_prestatore.dati_anagrafici.regime_fiscale' => 'required|string|max:10',

            'cedente_prestatore.sede.indirizzo' => 'required|string|max:255',
            'cedente_prestatore.sede.numero_civico' => 'nullable|string|max:10',
            'cedente_prestatore.sede.cap' => 'required|string|size:5',
            'cedente_prestatore.sede.comune' => 'required|string|max:255',
            'cedente_prestatore.sede.provincia' => 'nullable|string|size:2',
            'cedente_prestatore.sede.nazione' => 'required|string|size:2',

            'cedente_prestatore.stabile_organizzazione.indirizzo' => 'required|string|max:255',
            'cedente_prestatore.stabile_organizzazione.numero_civico' => 'nullable|string|max:10',
            'cedente_prestatore.stabile_organizzazione.cap' => 'required|string|size:5',
            'cedente_prestatore.stabile_organizzazione.comune' => 'required|string|max:255',
            'cedente_prestatore.stabile_organizzazione.provincia' => 'required|string|size:2',
            'cedente_prestatore.stabile_organizzazione.nazione' => 'required|string|size:2',

            'cedente_prestatore.iscrizione_rea.ufficio' => 'required|string|size:2',
            'cedente_prestatore.iscrizione_rea.numero_rea' => 'required|string|max:20',
            'cedente_prestatore.iscrizione_rea.capitale_sociale' => 'nullable|numeric|min:0',
            'cedente_prestatore.iscrizione_rea.socio_unico' => 'nullable|boolean',
            'cedente_prestatore.iscrizione_rea.stato_liquidazione' => 'required|boolean',

            'cedente_prestatore.contatti.telefono' => 'required|string|max:20',
            'cedente_prestatore.contatti.fax' => 'nullable|string|max:20',
            'cedente_prestatore.contatti.email' => 'required|email|max:255',

            'cedente_prestatore.riferimento_amministrazione.riferimento' => 'nullable|string|max:255',
        ];
    }
}

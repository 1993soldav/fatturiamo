<?php

namespace App\Http\Controllers;

use App\Models\SedeModel;
use App\Models\ContattiModel;
use App\Models\IscrizioneReaModel;
use App\Models\DatiAnagraficiModel;
use App\Models\CedentePrestatoreModel;
use App\Http\Requests\StoreInvoiceRequest;
use App\Models\StabileOrganizzazioneModel;
use App\Models\RiferimentoAmministrazioneModel;
use Dsv\FatturaElettronica\Codifiche\RegimeFiscale;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\Sede;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\DatiAnagrafici;

class InvoiceController extends Controller
{
    public function readInvoice(StoreInvoiceRequest $request)
    {
        // Estrai i dati dalla request
        $datiAnagrafici = $request->input('cedente_prestatore.dati_anagrafici');
        $sede = $request->input('cedente_prestatore.sede');
        $stabileOrganizzazione = $request->input('cedente_prestatore.stabile_organizzazione');
        $iscrizioneRea = $request->input('cedente_prestatore.iscrizione_rea');
        $contatti = $request->input('cedente_prestatore.contatti');
        $riferimentoAmministrazione = $request->input('cedente_prestatore.riferimento_amministrazione');
        $regimeFiscaleCodice = $request->input('cedente_prestatore.dati_anagrafici.regime_fiscale');

        // Salva i dati nelle tabelle appropriate
        $anagrafica = new DatiAnagraficiModel();
        $anagrafica->fill($datiAnagrafici);
        $anagrafica->save();

        $sedeModel = new SedeModel();
        $sedeModel->fill($sede);
        $sedeModel->save();

        $stabileOrganizzazioneModel = new StabileOrganizzazioneModel();
        $stabileOrganizzazioneModel->fill($stabileOrganizzazione);
        $stabileOrganizzazioneModel->save();

        $iscrizioneReaModel = new IscrizioneReaModel();
        $iscrizioneReaModel->fill($iscrizioneRea);
        $iscrizioneReaModel->save();

        $contattiModel = new ContattiModel();
        $contattiModel->fill($contatti);
        $contattiModel->save();

        $riferimentoAmministrazioneModel = new RiferimentoAmministrazioneModel();
        $riferimentoAmministrazioneModel->fill($riferimentoAmministrazione);
        $riferimentoAmministrazioneModel->save();

        $cedentePrestatore = new CedentePrestatoreModel();
        $cedentePrestatore->dati_anagrafici_id = $anagrafica->id;
        $cedentePrestatore->sede_id = $sedeModel->id;
        $cedentePrestatore->stabile_organizzazione_id = $stabileOrganizzazioneModel->id;
        $cedentePrestatore->iscrizione_rea_id = $iscrizioneReaModel->id;
        $cedentePrestatore->contatti_id = $contattiModel->id;
        $cedentePrestatore->riferimento_amministrazione_id = $riferimentoAmministrazioneModel->id;
        $cedentePrestatore->save();

        $codifiche = RegimeFiscale::getCodifiche();
        $regimeFiscale = $codifiche[$regimeFiscaleCodice];

        $anagraficaCedente = new DatiAnagrafici(
            $anagrafica->codice_fiscale,
            $anagrafica->denominazione,
            $anagrafica->id_paese,
            $anagrafica->id_codice,
            $regimeFiscale
        );

        $sedeCedente = new Sede(
            $sedeModel->indirizzo,
            $sedeModel->numero_civico,
            $sedeModel->cap,
            $sedeModel->comune,
            $sedeModel->provincia,
            $sedeModel->nazione
        );


        // Restituisci una risposta di successo
        return response()->json($sedeCedente, 200);


        /* $anagraficaCedente = new DatiAnagrafici(
            '123456789',
            'Acme SpAA',
            'IT',
            '12345678901',
            RegimeFiscale::Ordinario
        );
        $sedeCedente = new Sede('IT', 'Via Roma 10', '33018', 'Tarvisio', 'UD');

        $fatturaElettronicaFactory = new FatturaElettronicaFactory(
            $anagraficaCedente,
            $sedeCedente,
            '+391234567',
            'info@email.it'
        );

        $anagraficaCessionario = new DatiAnagrafici('XYZYZX77M04H888K', 'Pinco Palla');

        $sedeCessionario = new Sede('IT', 'Via le dita dal naso 35', '33018', 'Tarvisio', 'UD');

        $fatturaElettronicaFactory->setCessionarioCommittente($anagraficaCessionario, $sedeCessionario);

        $datiGenerali = new DatiGenerali(
            TipoDocumento::Fattura,
            '2018-11-22',
            '2018221111',
            122
        );

        $datiPagamento = new DatiPagamento(
            ModalitaPagamento::SEPA_CORE,
            '2018-11-30',
            122
        );
        $linee = [];
        // linee fattura
        // aggiungere solo linee con la stessa aliquota. Per adesso non gestisce blocchi DatiBeniServizi multipli

        $linee[] = new Linea('Articolo1', 50, 'ABC');
        $linee[] = new Linea('Articolo2', 50, 'CDE');

        $dettaglioLinee = new DettaglioLinee($linee);

        $fattura = $fatturaElettronicaFactory->create(
            $datiGenerali,
            $datiPagamento,
            $dettaglioLinee,
            '001'
        );

        // ottenere il nome della fattura conforme per l'SDI
        $file = $fattura->getFileName();

        //generazione file XML
        $xml = $fattura->toXml();

        //print su schermo
        echo $xml;

        //scrivi file
        file_put_contents($file, $xml); */
    }


    /* public function readInvoice()
    {
        $anagraficaCedente = new DatiAnagrafici(
            '123456789',
            'Acme SpAA',
            'IT',
            '12345678901',
            RegimeFiscale::Ordinario
        );
        $sedeCedente = new Sede('IT', 'Via Roma 10', '33018', 'Tarvisio', 'UD');

        $fatturaElettronicaFactory = new FatturaElettronicaFactory(
            $anagraficaCedente,
            $sedeCedente,
            '+391234567',
            'info@email.it'
        );

        $anagraficaCessionario = new DatiAnagrafici('XYZYZX77M04H888K', 'Pinco Palla');

        $sedeCessionario = new Sede('IT', 'Via le dita dal naso 35', '33018', 'Tarvisio', 'UD');

        $fatturaElettronicaFactory->setCessionarioCommittente($anagraficaCessionario, $sedeCessionario);

        $datiGenerali = new DatiGenerali(
            TipoDocumento::Fattura,
            '2018-11-22',
            '2018221111',
            122
        );

        $datiPagamento = new DatiPagamento(
            ModalitaPagamento::SEPA_CORE,
            '2018-11-30',
            122
        );
        $linee = [];
        // linee fattura
        // aggiungere solo linee con la stessa aliquota. Per adesso non gestisce blocchi DatiBeniServizi multipli

        $linee[] = new Linea('Articolo1', 50, 'ABC');
        $linee[] = new Linea('Articolo2', 50, 'CDE');

        $dettaglioLinee = new DettaglioLinee($linee);

        $fattura = $fatturaElettronicaFactory->create(
            $datiGenerali,
            $datiPagamento,
            $dettaglioLinee,
            '001'
        );

        // ottenere il nome della fattura conforme per l'SDI
        $file = $fattura->getFileName();

        //generazione file XML
        $xml = $fattura->toXml();

        //print su schermo
        echo $xml;

        //scrivi file
        file_put_contents($file, $xml);
    } */
}

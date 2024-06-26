<?php
/**
 * This file is part of dsv/fattura-elettronica
 *
 * Copyright (c) Davide Solinas Simone Viagi <sg@dsv.it>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Dsv\FatturaElettronica;

use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaBody\DatiBeniServizi;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaBody\DatiGenerali;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaBody\DatiPagamento;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\DatiAnagrafici;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\Sede;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\DatiTrasmissione;

interface FatturaInterface
{

    /**
     * Ritorna anagrafica cedente
     * @return DatiAnagrafici
     */
    public function getAnagraficaCedente();

    /**
     * Ritorna telefono cedente per contatto
     * @return string
     */
    public function getTelefonoCedente();

    /**
     * Ritorna email cedente per contatto
     */
    public function getEmailCedente();

    /**
     * Ritorna sede cedente
     * @return Sede
     */
    public function getSedeCedente();

    /**
     * Ritorna anagrafica cessionario
     * @return DatiAnagrafici
     */
    public function getAnagraficaCessionario();

    /**
     * Ritorna array sede cessionario
     * @return Sede
     */
    public function getSedeCessionario();

    /**
     * Ritorna i dati trasmissione
     * @return DatiTrasmissione
     */
    public function getDatiTrasmissione();

    /**
     * Riotrna array dati generali
     * @return DatiGenerali
     */
    public function getDatiGenerali();

    /**
     * Ritorna array dati pagamento
     * @return DatiPagamento
     */
    public function getDatiPagamento();

    /**
     * Ritorna dati beni servizi
     * @return DatiBeniServizi
     */
    public function getDatiBeniServizi();

    /**
     * Ritorna il tipo documento
     * @return string
     */
    public function getTipoDocumento();

    /**
     * Ritorna la modalità pagamento
     * @return string
     */
    public function getModalitaPagamento();

    /**
     * Ritorna importo del pagamento
     * @return float
     */
    public function getImportoPagamento();
}

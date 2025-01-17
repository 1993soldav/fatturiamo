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

namespace Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common;

use Dsv\FatturaElettronica\Traits\MagicFieldsTrait;
use Dsv\FatturaElettronica\XmlSerializableInterface;

class DatiAnagrafici implements XmlSerializableInterface
{
    use MagicFieldsTrait;
    /** @var string */
    public $codiceFiscale;
    /** @var string */
    public $denominazione;
    /** @var string */
    public $idPaese;
    /** @var string */
    public $idCodice;
    /** @var string */
    public $regimeFiscale;
    /** @var string */
    public $titolo;
    /** @var string */
    public $codEORI;
    /** @var string */
    public $alboProfessionale;
    /** @var string */
    public $provinciaAlbo;
    /** @var string */
    public $numeroIscrizioneAlbo;
    /** @var string */
    public $dataIscrizioneAlbo;

    /**
     * DatiAnagrafici constructor.
     * @param string $codiceFiscale
     * @param string $denominazione
     * @param string $idPaese
     * @param string $idCodice
     * @param string $regimeFiscale
     * @param string $titolo
     * @param string $codEORI
     * @param string $alboProfessionale
     * @param string $provinciaAlbo
     * @param string $numeroIscrizioneAlbo
     * @param string $dataIscrizioneAlbo
     */
    public function __construct(
        $codiceFiscale,
        $denominazione = '',
        $idPaese = '',
        $idCodice = '',
        $regimeFiscale = '',
        $titolo = '',
        $codEORI = '',
        $alboProfessionale = '',
        $provinciaAlbo = '',
        $numeroIscrizioneAlbo = '',
        $dataIscrizioneAlbo = ''
    ) {
        $this->codiceFiscale = $codiceFiscale;
        $this->denominazione = $denominazione;
        $this->idPaese = $idPaese;
        $this->idCodice = $idCodice;
        $this->regimeFiscale = $regimeFiscale;
        $this->titolo = $titolo;
        $this->codEORI = $codEORI;
        $this->alboProfessionale = $alboProfessionale;
        $this->provinciaAlbo = $provinciaAlbo;
        $this->numeroIscrizioneAlbo = $numeroIscrizioneAlbo;
        $this->dataIscrizioneAlbo = $dataIscrizioneAlbo;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('DatiAnagrafici');
        if ($this->idCodice && $this->idPaese) {
            $writer->startElement('IdFiscaleIVA');
            $writer->writeElement('IdPaese', $this->idPaese);
            $writer->writeElement('IdCodice', $this->idCodice);
            $writer->endElement();
        }
        if ($this->codiceFiscale) {
            $writer->writeElement('CodiceFiscale', $this->codiceFiscale);
        }
        $writer->startElement('Anagrafica');
        if ($this->denominazione) {
            $writer->writeElement('Denominazione', $this->denominazione);
        }
        if ($this->nome) {
            $writer->writeElement('Nome', $this->nome);
        }
        if ($this->cognome) {
            $writer->writeElement('Cognome', $this->cognome);
        }
        if ($this->titolo) {
            $writer->writeElement('Titolo', $this->titolo);
        }
        if ($this->codEORI) {
            $writer->writeElement('CodEORI', $this->codEORI);
        }
        $writer->endElement();
        if($this->alboProfessionale) {
            $writer->writeElement('AlboProfessionale', $this->alboProfessionale);
        }
        if ($this->provinciaAlbo) {
            $writer->writeElement('ProvinciaAlbo', $this->provinciaAlbo);
        }
        if ($this->numeroIscrizioneAlbo) {
            $writer->writeElement('NumeroIscrizioneAlbo', $this->numeroIscrizioneAlbo);
        }
        if ($this->dataIscrizioneAlbo) {
            $writer->writeElement('DataIscrizioneAlbo', $this->dataIscrizioneAlbo);
        }
        if ($this->regimeFiscale) {
            $writer->writeElement('RegimeFiscale', $this->regimeFiscale);
        }
        $this->writeXmlFields($writer);
        $writer->endElement();
        return $writer;
    }
}

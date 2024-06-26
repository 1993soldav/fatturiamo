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

class Sede implements XmlSerializableInterface
{
    use MagicFieldsTrait;
    /** @var string */
    protected $indirizzo;
    /** @var string */
    protected $numeroCivico;
    /** @var string */
    protected $cap;
    /** @var string */
    protected $comune;
    /** @var string */
    protected $provincia;
    /** @var string */
    protected $nazione;

    /**
     * Sede constructor.
     * @param string $indirizzo
     * @param string $numeroCivico
     * @param string $cap
     * @param string $comune
     * @param string $provincia
     * @param string $nazione
     */
    public function __construct(
        $indirizzo = '',
        $numeroCivico = '',
        $cap = '',
        $comune = '',
        $provincia = '',
        $nazione = ''
    ) {
        $this->indirizzo = $indirizzo;
        $this->numeroCivico = $numeroCivico;
        $this->cap = $cap;
        $this->comune = $comune;
        $this->provincia = $provincia;
        $this->nazione = $nazione;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('Sede');
        $writer->writeElement('Indirizzo', $this->indirizzo);
        $writer->writeElement('NumeroCivico', $this->numeroCivico);
        $writer->writeElement('CAP', $this->cap);
        $writer->writeElement('Comune', $this->comune);
        if ($this->provincia) {
            $writer->writeElement('Provincia', $this->provincia);
        }
        $writer->writeElement('Nazione', $this->nazione);
        $this->writeXmlFields($writer);
        $writer->endElement();
        return $writer;
    }
}

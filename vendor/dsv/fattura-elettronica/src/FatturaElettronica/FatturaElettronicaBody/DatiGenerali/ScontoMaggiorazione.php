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

namespace Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaBody\DatiGenerali;

use Dsv\FatturaElettronica\Traits\MagicFieldsTrait;
use Dsv\FatturaElettronica\XmlSerializableInterface;

class ScontoMaggiorazione implements XmlSerializableInterface
{
    use MagicFieldsTrait;

    const SCONTO = 'SC';
    const MAGGIORAZIONE = 'MG';

    /** @var ScontoMaggiorazione */
    protected $scontoMaggiorazione;
    /** @var string */
    protected $tipo;
    /** @var float */
    protected $percentuale;
    /** @var float */
    protected $importo;

    /**
     * ScontoMaggiorazione constructor.
     * @param $tipo
     * @param $percentuale
     * @param $importo
     */
    public function __construct($tipo, $percentuale, $importo)
    {
        $this->tipo = $tipo;
        $this->percentuale = $percentuale;
        $this->importo = $importo;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('ScontoMaggiorazione');
        $writer->writeElement('Tipo', $this->tipo);
        if ($this->percentuale) {
            $writer->writeElement('Percentuale', fe_number_format($this->percentuale, 2));
        }
        if ($this->importo) {
            $writer->writeElement('Importo', fe_number_format($this->importo, 2));
        }
        $this->writeXmlFields($writer);
        $writer->endElement();
        return $writer;
    }

}

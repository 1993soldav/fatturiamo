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

class DatiBollo implements XmlSerializableInterface
{
    use MagicFieldsTrait;

    /** @var DatiBollo */
    protected $datiBollo;
    /** @var string */
    protected $bolloVirtuale;
    /** @var float */
    protected $importoBollo;

    /**
     * DatiBollo constructor.
     * @param $bolloVirtuale
     * @param $importo
     */
    public function __construct($bolloVirtuale, $importo)
    {
        $this->bolloVirtuale = $bolloVirtuale;
        $this->importoBollo = $importo;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('DatiBollo');
        $writer->writeElement('BolloVirtuale', $this->bolloVirtuale);
        $writer->writeElement('ImportoBollo', fe_number_format($this->importoBollo, 2));
        $this->writeXmlFields($writer);
        $writer->endElement();
        return $writer;
    }

}

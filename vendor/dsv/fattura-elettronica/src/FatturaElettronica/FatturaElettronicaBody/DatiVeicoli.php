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

namespace Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaBody;

use Dsv\FatturaElettronica\Traits\MagicFieldsTrait;
use Dsv\FatturaElettronica\XmlSerializableInterface;

class DatiVeicoli implements XmlSerializableInterface
{
    use MagicFieldsTrait;

    /** @var string */
    protected $data;
    /** @var string */
    protected $totalePercorso;

    /**
     * DatiVeicoli constructor.
     * @param string $data
     * @param string $totalePercorso
     */
    public function __construct($data, $totalePercorso)
    {
        $this->data = $data;
        $this->totalePercorso = $totalePercorso;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('DatiVeicoli');
        $writer->writeElement('Data', $this->data);
        $writer->writeElement('TotalePercorso', $this->totalePercorso);
        $this->writeXmlFields($writer);
        $writer->endElement();
        return $writer;
    }
}
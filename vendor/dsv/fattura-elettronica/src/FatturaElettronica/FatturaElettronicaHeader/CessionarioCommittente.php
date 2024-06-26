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

namespace Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader;

use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\DatiAnagrafici;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\Sede;
use Dsv\FatturaElettronica\Traits\MagicFieldsTrait;
use Dsv\FatturaElettronica\XmlSerializableInterface;

class CessionarioCommittente implements XmlSerializableInterface
{
    use MagicFieldsTrait;
    /** @var DatiAnagrafici */
    protected $datiAnagrafici;
    /** @var Sede */
    protected $sede;

    /**
     * CessionarioCommittente constructor.
     * @param DatiAnagrafici $datiAnagrafici
     * @param Sede $sede
     */
    public function __construct(
        DatiAnagrafici $datiAnagrafici,
        Sede $sede
    ) {
        $this->datiAnagrafici = $datiAnagrafici;
        $this->sede = $sede;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('CessionarioCommittente');
            $this->datiAnagrafici->toXmlBlock($writer);
            $this->sede->toXmlBlock($writer);
            $this->writeXmlFields($writer);
        $writer->endElement();
        return $writer;
    }
}

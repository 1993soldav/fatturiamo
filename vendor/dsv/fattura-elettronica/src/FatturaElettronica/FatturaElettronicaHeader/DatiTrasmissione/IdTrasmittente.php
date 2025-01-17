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

namespace Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\DatiTrasmissione;

use Dsv\FatturaElettronica\XmlSerializableInterface;

class IdTrasmittente implements XmlSerializableInterface
{
    /** @var string */
    public $idPaese;
    /** @var string */
    public $idCodice;

    /**
     * IdTrasmittente constructor.
     * @param string $idPaese
     * @param integer $idCodice
     */
    public function __construct($idPaese, $idCodice)
    {
        $this->idPaese = $idPaese;
        $this->idCodice = $idCodice;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('IdTrasmittente');
            $writer->writeElement('IdPaese', $this->idPaese);
            $writer->writeElement('IdCodice', $this->idCodice);
        $writer->endElement();
        return $writer;
    }
}

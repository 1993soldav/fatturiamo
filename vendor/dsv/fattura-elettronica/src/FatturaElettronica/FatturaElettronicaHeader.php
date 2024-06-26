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

namespace Dsv\FatturaElettronica\FatturaElettronica;

use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\CedentePrestatore;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\CessionarioCommittente;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\DatiAnagrafici;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\DatiTrasmissione;
use Dsv\FatturaElettronica\XmlSerializableInterface;
use phpDocumentor\Reflection\Types\Nullable;

class FatturaElettronicaHeader implements XmlSerializableInterface
{
    const FE_CODE = 1.0;
    /** @var DatiTrasmissione */
    public $datiTrasmissione;
    /** @var CedentePrestatore */
    public $cedentePrestatore;
    /** @var CessionarioCommittente */
    protected $cessionarioCommittente;
    /** @var DatiAnagrafici|null */
    protected $terzoIntermediario;
    /** @var string */
    protected $soggettoEmittente;

    /**
     * FatturaElettronicaHeader constructor.
     * @param DatiTrasmissione $datiTrasmissione
     * @param CedentePrestatore $cedentePrestatore
     * @param CessionarioCommittente $cessionarioCommittente
     * @param DatiAnagrafici|null $terzoIntermediario
     * @param string $soggettoEmittente
     */
    public function __construct(
        DatiTrasmissione $datiTrasmissione,
        CedentePrestatore $cedentePrestatore,
        CessionarioCommittente $cessionarioCommittente,
        DatiAnagrafici $terzoIntermediario = null,
        $soggettoEmittente = 'TZ'
    ) {
        $this->datiTrasmissione = $datiTrasmissione;
        $this->cedentePrestatore = $cedentePrestatore;
        $this->cessionarioCommittente = $cessionarioCommittente;
        $this->terzoIntermediario = $terzoIntermediario;
        $this->soggettoEmittente = $soggettoEmittente;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('FatturaElettronicaHeader');
            $this->datiTrasmissione->toXmlBlock($writer);
            $this->cedentePrestatore->toXmlBlock($writer);
            $this->cessionarioCommittente->toXmlBlock($writer);
            if ($this->terzoIntermediario) {
                $writer->startElement('TerzoIntermediarioOSoggettoEmittente');
                    $this->terzoIntermediario->toXmlBlock($writer);
                $writer->endElement();
                $writer->writeElement('SoggettoEmittente', $this->soggettoEmittente);
            }
        $writer->endElement();
        return $writer;
    }
}

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

class DatiRitenuta implements XmlSerializableInterface
{
    use MagicFieldsTrait;

    /** @var DatiRitenuta  */
    protected $datiRitenuta;
    /** @var string */
    protected $tipo;
    /** @var float */
    protected $importo;
    /** @var float */
    protected $aliquota;
    /** @var string */
    protected $causale;

    /**
     * DatiRitenuta constructor.
     * @param string $numeroDdt
     * @param string $dataDdt
     * @param array $riferimentoNumeroLinee
     */
    public function __construct($tipo, $importo, $aliquota, $causale)
    {
        $this->tipo = $tipo;
        $this->importo = $importo;
        $this->aliquota = $aliquota;
        $this->causale = $causale;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('DatiRitenuta');
                $writer->writeElement('TipoRitenuta', $this->tipo);
                $writer->writeElement('ImportoRitenuta', fe_number_format($this->importo,2));
                $writer->writeElement('AliquotaRitenuta', fe_number_format($this->aliquota,2));
                $writer->writeElement('CausalePagamento', $this->causale);
        $writer->endElement();
        return $writer;
    }

}

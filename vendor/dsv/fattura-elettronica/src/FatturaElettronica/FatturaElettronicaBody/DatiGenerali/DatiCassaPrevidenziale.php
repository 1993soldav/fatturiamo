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

class DatiCassaPrevidenziale implements XmlSerializableInterface
{
    use MagicFieldsTrait;

/*
<xs:complexType name="DatiCassaPrevidenzialeType">
    <xs:sequence>
      <xs:element name="TipoCassa"                  type="TipoCassaType"                    />
      <xs:element name="AlCassa"                    type="RateType"                         />
      <xs:element name="ImportoContributoCassa"     type="Amount2DecimalType"               />
      <xs:element name="ImponibileCassa"            type="Amount2DecimalType" minOccurs="0" />
      <xs:element name="AliquotaIVA"                type="RateType"                         />
      <xs:element name="Ritenuta"                   type="RitenutaType"       minOccurs="0" />
      <xs:element name="Natura"                     type="NaturaType"         minOccurs="0" />
      <xs:element name="RiferimentoAmministrazione" type="String20Type"       minOccurs="0" />
    </xs:sequence>
  </xs:complexType>

*/
    /** @var string */
    protected $tipo;
    /** @var float */
    protected $alCassa;
    /** @var float */
    protected $importoContributo;
    /** @var float */
    protected $imponibile;
    /** @var float */
    protected $aliquotaIVA;
    /** @var ritenuta */
    protected $ritenuta;
    /** @var natura */
    protected $natura;
    /** @var string */
    protected $riferimentoAmministrazione;
/*
*/
    /**
     * DatiCassaPrevidenziale constructor.
     * 
     */
    public function __construct($tipo, $alCassa, $importo, $imponibile, $aliquotaIVA, $ritenuta, $natura, $riferimento)
    {
        $this->tipo = $tipo;
        $this->alCassa = $alCassa;
        $this->importoContributo = $importo;
        $this->imponibile = $imponibile;
        $this->aliquotaIVA = $aliquotaIVA;
        $this->ritenuta = $ritenuta;
        $this->natura = $natura;
        $this->riferimentoAmministrazione = $riferimento;
    }


    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('DatiCassaPrevidenziale');
                $writer->writeElement('TipoCassa', $this->tipo);
                $writer->writeElement('AlCassa', fe_number_format($this->alCassa,2));
                $writer->writeElement('ImportoContributoCassa', fe_number_format($this->importoContributo,2));
                $writer->writeElement('ImponibileCassa', fe_number_format($this->imponibile,2));
                $writer->writeElement('AliquotaIVA', fe_number_format($this->aliquotaIVA,2));
		if ($this->ritenuta) {
			$this->ritenuta->toXmlBlock($writer);
		}
		if ($this->natura) {
			$writer->writeElement('Natura', $this->natura);
		}
		if ($this->riferimentoAmministrazione) {
			$writer->writeElement('RiferimentoAmministrazione', $this->riferimentoAmministrazione);
		}
        $writer->endElement();
        return $writer;
    }

}

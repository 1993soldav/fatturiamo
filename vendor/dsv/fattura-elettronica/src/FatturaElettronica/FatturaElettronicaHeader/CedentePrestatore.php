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

use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\CedentePrestatore\IscrizioneRea;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\DatiAnagrafici;
use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\Sede;
use Dsv\FatturaElettronica\Traits\MagicFieldsTrait;
use Dsv\FatturaElettronica\XmlSerializableInterface;

class CedentePrestatore implements XmlSerializableInterface
{
    use MagicFieldsTrait;
    /** @var DatiAnagrafici */
    protected $datiAnagrafici;
    /** @var Sede */
    protected $sede;
    /** @var IscrizioneRea */
    protected $iscrizioneRea;
    protected $riferimentoAmministrazione;


    /**
     * CedentePrestatore constructor.
     * @param DatiAnagrafici $datiAnagrafici
     * @param Sede $sede
     * @param IscrizioneRea $iscrizioneRea
     */
    public function __construct(
        DatiAnagrafici $datiAnagrafici,
        Sede $sede,
        IscrizioneRea $iscrizioneRea = null
    ) {
        $this->datiAnagrafici = $datiAnagrafici;
        $this->sede = $sede;
        $this->iscrizioneRea = $iscrizioneRea;
    }

    /**
     * @param IscrizioneRea $iscrizioneRea
     */
    public function setIscrizioneRea(IscrizioneRea $iscrizioneRea)
    {
        $this->iscrizioneRea = $iscrizioneRea;
    }

    /**
     * @param string $riferimentoAmministrazione
     */
    public function setRiferimentoAmministrazione($riferimentoAmministrazione)
    {
        $this->riferimentoAmministrazione = $riferimentoAmministrazione;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('CedentePrestatore');
            $this->datiAnagrafici->toXmlBlock($writer);
            $this->sede->toXmlBlock($writer);
            if ($this->iscrizioneRea) {
                $this->iscrizioneRea->toXmlBlock($writer);
            }
            if ($this->riferimentoAmministrazione) {
                $writer->writeElement('RiferimentoAmministrazione', $this->riferimentoAmministrazione);
            }
            $this->writeXmlFields($writer);
        $writer->endElement();
        return $writer;
    }
}

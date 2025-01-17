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

class DatiDdt implements XmlSerializableInterface, \Countable, \Iterator
{
    use MagicFieldsTrait;

    /** @var DatiDdt[]  */
    protected $datiDdt = [];
    /** @var string */
    protected $numeroDdt;
    /** @var string */
    protected $dataDdt;
    /** @var int[] */
    protected $riferimentoNumeroLinee = [];
    /** @var int  */
    protected $currentIndex = 0;

    /**
     * DatiDdt constructor.
     * @param string $numeroDdt
     * @param string $dataDdt
     * @param array $riferimentoNumeroLinee
     */
    public function __construct($numeroDdt, $dataDdt, $riferimentoNumeroLinee = [])
    {
        $this->numeroDdt = $numeroDdt;
        $this->dataDdt = $dataDdt;
        $this->riferimentoNumeroLinee = $riferimentoNumeroLinee;
        $this->datiDdt[] = $this;
    }


    public function addDatiDdt(DatiDdt $datiDdt)
    {
        $this->datiDdt[] = $datiDdt;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        /** @var DatiDdt $block */
        foreach ($this as $block) {
            $writer->startElement('DatiDDT');
                $writer->writeElement('NumeroDDT', $block->numeroDdt);
                $writer->writeElement('DataDDT', $block->dataDdt);
                foreach ($block->riferimentoNumeroLinee as $numeroLinea) {
                    $writer->writeElement('RiferimentoNumeroLinea', $numeroLinea);
                }
            $writer->endElement();
        }
        return $writer;
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->datiDdt[$this->currentIndex];
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->currentIndex++;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->currentIndex;
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return isset($this->datiDdt[$this->currentIndex]);
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->currentIndex = 0;
    }

    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->datiDdt);
    }
}

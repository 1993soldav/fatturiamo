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

namespace Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaBody\DatiBeniServizi;

use Dsv\FatturaElettronica\XmlSerializableInterface;

class DettaglioLinee implements \Countable, \Iterator, XmlSerializableInterface
{

    /** @var Linea[] */
    private $linee = [];

    /** @var int  */
    private $currentIndex = 0;

    /**
     * DettaglioLinee constructor.
     * @param null | Linea[] $linee
     */
    public function __construct($linee = null)
    {
        if ($linee) {
            $this->addLinee($linee);
        }
    }

    /**
     * Add single row
     * @param Linea $linea
     */
    public function addLinea(Linea $linea)
    {
        $linea->setNumeroLinea($this->count() + 1);
        $this->linee[] = $linea;
    }

    /**
     * Add multiple rows
     * @param Linea[] $linee
     */
    public function addLinee($linee)
    {
        /** @var Linea $linea */
        foreach ($linee as $linea) {
            if ($linea instanceof Linea) {
                $this->addLinea($linea);
            }
        }
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->linee[$this->currentIndex];
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->currentIndex++;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->currentIndex;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return isset($this->linee[$this->currentIndex]);
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->currentIndex = 0;
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->linee);
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        /** @var Linea $linea */
        foreach ($this as $linea) {
            $linea->toXmlBlock($writer);
        }

        return $writer;
    }
}

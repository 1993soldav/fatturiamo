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

namespace Dsv\FatturaElettronica;

use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\Common\DatiAnagrafici;

interface IntermediarioInterface
{
    /**
     * Restituisce i dati anagrafici dell'intermediario
     *
     * @return DatiAnagrafici
     */
    public function getAnagraficaIntermediario();

    /**
     * Restituisce 'TZ' o 'CC'
     *
     * @return string
     */
    public function getSoggettoEmittente();
}

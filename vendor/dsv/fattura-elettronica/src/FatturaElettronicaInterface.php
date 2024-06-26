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


use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\CedentePrestatore\IscrizioneRea;

interface FatturaElettronicaInterface
{
    /**
     * Restituisce il nome della fattura conforme all'SDI
     * @return string
     */
    public function getFileName();

    /**
     * Restituisce l'XML della fattura elettronica
     * @return string
     * @throws \Exception
     */
    public function toXml();

    /**
     * @param IscrizioneRea $iscrizioneRea
     * @return mixed
     */
    public function setIscrizioneRea(IscrizioneRea $iscrizioneRea);

    /**
     * Verifica l'xml della fattura
     * @return bool
     * @throws \Exception
     */
    public function verifica();
}

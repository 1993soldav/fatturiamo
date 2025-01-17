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

namespace Dsv\FatturaElettronica\Traits;

trait CodificaTrait
{

    /**
     * Descrizione della codifica
     *
     * @param $codice
     * @return bool|string
     */
    public static function descrizione($codice)
    {
        $descrizione = false;
        try {
            $descrizione = self::$codifiche[$codice];
        } catch (\Exception $exception) {
            //
        }
        return $descrizione;
    }
    /**
     * Lista della codifica
     *
     * @return array
     */
    public static function lista()
    {
         return self::$codifiche;
    }
}

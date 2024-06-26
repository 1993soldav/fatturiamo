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

if (! function_exists('fe_number_format')) {
    /**
     * @param float $number
     * @param int $decimals
     * @return string
     */
    function fe_number_format($number, $decimals = 2) {
        return number_format($number, $decimals, '.', '');
    }
}

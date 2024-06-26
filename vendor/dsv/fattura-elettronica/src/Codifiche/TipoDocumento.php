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

namespace Dsv\FatturaElettronica\Codifiche;

use Dsv\FatturaElettronica\Traits\CodificaTrait;

abstract class TipoDocumento
{
    use CodificaTrait;

    const Fattura = 'TD01';
    const AccontoSuFattura = 'TD02';
    const AccontoSuParcella = 'TD03';
    const NotaDiCredito = 'TD04';
    const NotaDiDebito = 'TD05';
    const Parcella = 'TD06';
    const FatturaDifferita = 'TD24';

    protected static $codifiche = array(
        'TD01' => 'Fattura',
        'TD02' => 'acconto/anticipo su fattura',
        'TD03' => 'acconto/anticipo su parcella',
        'TD04' => 'nota di credito',
        'TD05' => 'nota di debito',
        'TD06' => 'parcella',
        'TD24' => 'fattura differita'
    );
}

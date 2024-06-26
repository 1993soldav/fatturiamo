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

use Dsv\FatturaElettronica\Traits\MagicFieldsTrait;

abstract class XmlBlock implements XmlSerializableInterface
{
    use MagicFieldsTrait;
}

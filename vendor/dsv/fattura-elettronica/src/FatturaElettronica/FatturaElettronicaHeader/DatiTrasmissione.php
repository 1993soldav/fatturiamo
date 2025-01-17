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

use Dsv\FatturaElettronica\FatturaElettronica\FatturaElettronicaHeader\DatiTrasmissione\IdTrasmittente;
use Dsv\FatturaElettronica\Traits\MagicFieldsTrait;
use Dsv\FatturaElettronica\XmlSerializableInterface;

class DatiTrasmissione implements XmlSerializableInterface
{
    use MagicFieldsTrait;

    const FORMATO_PA = 'FPA12';
    const FORMATO_PRIVATO = 'FPR12';

    /** @var IdTrasmittente  */
    public $idTrasmittente;
    /** @var string */
    public $progressivoInvio;
    /** @var string */
    public $formatoTrasmissione;
    /** @var string */
    protected $codiceDestinatario;
    /** @var array  */
    protected $contattiTrasmittente = [];
    /** @var bool | string */
    protected $pecDestinatario;


    /**
     * DatiTrasmissione constructor.
     * @param IdTrasmittente $idTrasmittente
     * @param $progressivoInvio
     * @param string $codiceDestinatario
     * @param bool $pa
     * @param string $telefono
     * @param string $email
     * @param string $pecDestinatario
     */
    public function __construct(
        IdTrasmittente $idTrasmittente,
        $progressivoInvio,
        $codiceDestinatario = "0000000",
        $pa = false,
        $telefono = '',
        $email = '',
        $pecDestinatario = ''
    ) {
        $this->idTrasmittente = $idTrasmittente;
        $this->progressivoInvio = $progressivoInvio;
        $this->codiceDestinatario = $codiceDestinatario;
        $this->formatoTrasmissione = $pa ? self::FORMATO_PA : self::FORMATO_PRIVATO;
        if ($telefono) {
            $this->contattiTrasmittente['telefono'] = $telefono;
        }
        if ($email) {
            $this->contattiTrasmittente['email'] = $email;
        }
        $this->pecDestinatario = $pecDestinatario;
    }

    /**
     * @param \XMLWriter $writer
     * @return \XMLWriter
     */
    public function toXmlBlock(\XMLWriter $writer)
    {
        $writer->startElement('DatiTrasmissione');
        $this->idTrasmittente->toXmlBlock($writer);
        $writer->writeElement('ProgressivoInvio', $this->progressivoInvio);
        $writer->writeElement('FormatoTrasmissione', $this->formatoTrasmissione);
        $writer->writeElement('CodiceDestinatario', $this->codiceDestinatario);
        if (count($this->contattiTrasmittente)) {
            $writer->startElement('ContattiTrasmittente');
            if (array_key_exists('telefono', $this->contattiTrasmittente)) {
                $writer->writeElement('Telefono', $this->contattiTrasmittente['telefono']);
            }
            if (array_key_exists('email', $this->contattiTrasmittente)) {
                $writer->writeElement('Email', $this->contattiTrasmittente['email']);
            }
            $writer->endElement();
        }
        if ($this->pecDestinatario) {
            $writer->writeElement('PECDestinatario', $this->pecDestinatario);
        }
        $this->writeXmlFields($writer);
        $writer->endElement();
        return $writer;
    }
}

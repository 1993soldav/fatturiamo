<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiferimentoAmministrazioneModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'riferimento_amministrazione';

    protected $fillable = [
        'riferimento',
    ];
}

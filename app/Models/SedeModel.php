<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedeModel extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'sede';

    protected $fillable = [
        'indirizzo',
        'numero_civico',
        'cap',
        'comune',
        'provincia',
        'nazione',
    ];
}

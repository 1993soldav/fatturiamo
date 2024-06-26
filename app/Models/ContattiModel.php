<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContattiModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contatti';

    protected $fillable = [
        'telefono',
        'fax',
        'email',
    ];
}

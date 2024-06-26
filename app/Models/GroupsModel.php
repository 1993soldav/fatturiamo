<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupsModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'groups';

    protected $fillable = [
        'name',
        'description',
        'status'
    ];
}

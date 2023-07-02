<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Procedura extends Model
{
    protected $fillable = [
        'firma1',
        'firma2',
        'firma3',
        'firma4',
        'numero_firme',
        'documento_da_firmare',
        'nome_procedura',
        'firmatario1',
        'firmatario2',
        'firmatario3',
        'firmatario4',
        'firmatario5',
    ];
}

<?php

namespace Modules\Livro\Entities;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    public $incrementing = true;

    protected $table        = 'Livro';
    protected $primaryKey   = 'Codl';
    public $fillable = [
        'Titulo',
        'Editora',
        'Edicao',
        'AnoPublicacao',
        'Valor',
    ];

    public $timestamps = false;
}

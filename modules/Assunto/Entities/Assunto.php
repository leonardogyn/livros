<?php

namespace Modules\Assunto\Entities;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    public $incrementing = true;

    protected $table        = 'assunto';
    protected $primaryKey   = 'codas';
    public $fillable = [
        'descricao'
    ];

    public $timestamps = false;
}

<?php

namespace Modules\Autor\Entities;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    public $incrementing = true;

    protected $table        = 'autor';
    protected $primaryKey   = 'codau';
    public $fillable = [
        'nome'
    ];

    public $timestamps = false;
}

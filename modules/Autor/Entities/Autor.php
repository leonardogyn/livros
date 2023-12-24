<?php

namespace Modules\Autor\Entities;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    public $incrementing = true;

    protected $table        = 'Autor';
    protected $primaryKey   = 'CodAu';
    public $fillable = [
        'Nome'
    ];

    public $timestamps = false;
}

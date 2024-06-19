<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormatoUno extends Model
{
    use HasFactory;
    protected $table = 't_formato_uno';
    protected $primaryKey = 'id_formato_uno';
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    use HasFactory;
    protected $table = 't_domicilio';
    protected $primaryKey = 'id_domicilio';
    public $timestamps = false;
}

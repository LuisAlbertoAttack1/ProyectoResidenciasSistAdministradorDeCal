<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 't_cat_rol';
    protected $primaryKey = 'id_cat_rol';
    public $timestamps = false;
}

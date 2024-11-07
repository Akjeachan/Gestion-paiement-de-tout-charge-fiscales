<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typetaxe extends Model
{
    use HasFactory;
    protected $table='type_de_taxe';
    protected $fillable=['id','taxe'];
    public $timestamps=false;
}

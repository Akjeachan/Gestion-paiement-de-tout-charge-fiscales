<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribuable extends Model
{
    use HasFactory;
    protected $table='contribuable';
    protected $fillable=['id','nom','prenom','nif','societe','email','adresse'];
    public $timestamps=false;
}

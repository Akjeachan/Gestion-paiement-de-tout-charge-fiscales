<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $table='utilisateur';
    protected $fillable=['id','identifiant','password'];
    public $timstamps=false;
}

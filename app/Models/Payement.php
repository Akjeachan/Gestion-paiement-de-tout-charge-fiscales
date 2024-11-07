<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    use HasFactory;
    protected $table='detail_payement';
    protected $fillable=['id','fourniseur','codefourniseur','numerocontribuable','cle'];
    public $timestamps=false;
}

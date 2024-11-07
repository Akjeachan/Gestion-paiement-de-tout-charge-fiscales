<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeDePayement extends Model
{
    use HasFactory;
    protected $table='mode_de_payement';
    protected $fillable=['id','payment'];
    public $timestamps=false;
}

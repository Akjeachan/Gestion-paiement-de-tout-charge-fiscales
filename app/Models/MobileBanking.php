<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileBanking extends Model
{
    use HasFactory;
    protected $table='mobilebanking';
    protected $fillable=['id','operateur','references',];
    public $timestamps=false;
}

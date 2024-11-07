<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
{
    use HasFactory;
    protected $table='declaration';
    protected $fillable=['id','idcontribuable','datedeclaration','montant'];
    public $timestamps=false;
}

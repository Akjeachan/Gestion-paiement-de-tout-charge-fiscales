<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaration_Detail extends Model
{
    use HasFactory;
    protected $table='detail_declaration';
    protected $fillable=['iddeclaration','montant_a_recouvrire','datedebut','datefin','idetatpayement','idmodepayeemnt'];
    public $timestamps=false;
}

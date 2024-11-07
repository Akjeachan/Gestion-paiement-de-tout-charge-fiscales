<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValidationController extends Controller
{
    public function MiseAJourChargeFiscal(Request $request){
        $montantapayer=$request->input('montantapayer');
        $montantpayer=$request->input('montantpayer');
        $montantrestent=$request->input('montantrestent');
        $datepayement=Carbon::now();
        $iddetaildeclaration=session('iddetaildeclaration');
        DB::insert('insert into payement_detail_declaration (id,montant_payement,reste_payement,montant_a_payer,datepayement,iddetaildeclaration)values(seq_declaration_payement.nextval,?,?,?,?,?)',[$montantpayer,$montantrestent,$montantapayer,$datepayement,$iddetaildeclaration]);
        DB::commit();

    }
}

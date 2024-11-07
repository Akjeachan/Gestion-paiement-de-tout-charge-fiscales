<?php

namespace App\Http\Controllers;

use App\Models\Virement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VirementController extends Controller
{
    public function AjoutVirement(Request $request){
        $codebanque=$request->input('codebanque');
        $codeagence=$request->input('codeagent');
        $numerodecompte=$request->input('numerodecompte');
        $clerib=$request->input('clerib');
        DB::insert('insert into viremtn (id,codebanque,codeagence,numerodecompte,clerib) values (seq_virement.nextval,?,?,?,?)', [$codebanque,$codeagence,$numerodecompte,$clerib]);

    }
    public function InformationVirement(Request $request){
        $fourniseur=$request->input('fourniseur');
        $codefourniseur=$request->input('codefourniseur');
        $numerocontribuable=$request->input('numerocontribuable');
        $cle=$request->input('cle');
        DB::insert('insert into detail_payement (id,fourniseur,codefourniseur,numerocontribuable,cle) values (seq_detail_payement.nextval,?,?,?,?)',[$fourniseur,$codefourniseur,$numerocontribuable,$cle]);
        return redirect('/generepdf');
    }
    public function VirementFile(Request $request){
        $file=storage_path($request->input('filevirement'));

    }
    public function ListeVirement(){

    }
}

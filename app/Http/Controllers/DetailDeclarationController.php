<?php

namespace App\Http\Controllers;

use App\Models\Contribuable;
use App\Models\Declaration_Detail;
use App\Models\ModeDePayement;
use App\Models\VDetailDeclaration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DetailDeclarationController extends Controller
{
    public function ListeDesCharge(){
        $id=session('contribuable_id');
        $data=VDetailDeclaration::where('idcontribuable',$id)->where('etat','a payer')->get();
        return view('listedescharge',compact('data'));
    }
    public function ChoixContribuable(Request $request){
        $choix=[];
                $payer=$request->input('montantpayer');
                $iddeclaration=$request->input('select');
                $choix=[$payer,$iddeclaration];
               Session::put('idchoix',$choix);
                return redirect('/lecturechoix');
    }
    public function LectureChoix(){
        $data=ModeDePayement::all();
        return view('modedepayement',compact('data'));
    }
    public function ValidationPayement($iddeclaration){
        $detaildeclaration=Declaration_Detail::where('iddeclaration',$iddeclaration)->update(['idetatpayement'=>3,'idetatvalidation'=>4]);
        return response()->json('validation effectuer');
    }
    public function ChoixModePayement(Request $request){
        $id=session('idchoix');
        $idcontribuable=session('idcontribuable');
        $modedepayement=$request->input('idmodepayement');
        $declaration=Declaration_Detail::where('iddeclaration',$id[1][0])->first();
        $montant_a_payer=$declaration->montant_a_recouvrire;
        $montant_payer=floatval($id[0][0]);
        $montant_restant=$montant_a_payer-$montant_payer;
        $datepayement=Carbon::now();
        Declaration_Detail::where('iddeclaration',$id[1][0])->update(['idmodepayement'=>$modedepayement,
        'montant_payer'=>$montant_payer]);
        $detaildeclaration=Declaration_Detail::where('iddeclaration',$id[1][0])->first();
        DB::insert('insert into payement_detail_declaration (id,montant_payement,reste_payement,montant_a_payement,datepayement,iddetaildeclaration)values(seq_payement_declaration.nextval,?,?,?,?,?)',[$montant_payer,$montant_restant,$montant_a_payer,$datepayement->format('Y-m-d'),$detaildeclaration->id]);
        DB::commit();
        if ($modedepayement==2){
            return response()->json("mobile banking");
        }
        elseif ($modedepayement==3) {
            $idcontribuable=session('contribuable_id');
            $contribuable=Contribuable::where('id',$idcontribuable)->first();
            return view('virementbancaire',compact('contribuable','montant_payer'));
        }
        // return response()->json($montant_restant);
    }
}

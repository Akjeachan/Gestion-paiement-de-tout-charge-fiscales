<?php

namespace App\Http\Controllers;

use App\Models\Contribuable;
use App\Models\Typetaxe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ContribuableController extends Controller
{
    public function Allcontribuable(){
        $data=Contribuable::all();
        dd($data);
    }
    public function AjoutContribuable(Request $request){
        $nom=$request->input('nom');
        $prenom=$request->input('prenom');
        $nif=$request->input('nif');
        $societe=$request->input('societe');
        $email=$request->input('email');
        $adresse=$request->input('adresse');
        DB::insert('insert into contribuable (id,nom,prenom,nif,societe,email,adresse) values (seq_contribuable.nextval,?,?,?,?,?,?)',[$nom,$prenom,$nif,$societe,$email,$adresse]);
        return view('confirmation');
    }
    public function ConfirmationContribuable(Request $request){
        $nif=$request->input('nif');
        $email=$request->input('email');
        $contribuable=Contribuable::where('nif',$nif)->where('email',$email)->first();
        if ($contribuable) {
            Session::put('contribuable_id' , $contribuable->id);
            $item=Contribuable::select('nom','prenom','id')->where('id',$contribuable->id)->first();
        $data2=Typetaxe::select('taxe','id')->get();
        return view('declaration',compact('item','data2'));
        }
        else {
            return view('contribuable');
        }
    }
}

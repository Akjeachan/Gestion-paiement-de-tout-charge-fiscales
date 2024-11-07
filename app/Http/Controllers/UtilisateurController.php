<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Vdeclarationvalider;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function VerificationUtilisateur(Request $request){
        $identifiant=$request->input('identifiant');
        $password=$request->input('password');
        $verification=Utilisateur::where('identifiant',$identifiant)->where('password',$password)->get();
        if (!empty($verification)) {
            $data=Vdeclarationvalider::all();
            return view('validation',compact('data'));
        }
        else{
            return redirect()->back()->with('error','login fails');
        }
    }
}

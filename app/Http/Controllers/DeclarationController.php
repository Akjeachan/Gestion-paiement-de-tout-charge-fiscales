<?php

namespace App\Http\Controllers;

use App\Models\Declaration;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeclarationController extends Controller
{
    public function AjoutDeclaration(Request $request)
    {
        $idcontribuable = $request->input('idcontribuable');
        $idtypetaxe = $request->input('idtypetaxe');
        $datedeclaration = new DateTime($request->input('datedeclaration'));
        $montant = $request->input('montant');
        DB::insert('insert into declaration(id,idcontribuable,datedeclaration,montant,idtype_taxe) values (seq_declaration.nextval,?,?,?,?)', [$idcontribuable, $datedeclaration, $montant, $idtypetaxe]);
        DB::commit();
        return redirect('/ajoutdetaildeclaration');
    }
    public function AjoutDetailDeclaration()
    {

        $declaration = Declaration::orderBy('id', 'desc')->first();
        if ($declaration->idtype_taxe == 5) {

            $iddeclaration = $declaration->id;
            $date = new DateTime($declaration->datedeclaration);
            $montant_a_recouvrire = $declaration->montant * 0.05;
            $datedebut = clone $date;
            $datedebut->add(new DateInterval('P1Y'))->setDate($datedebut->format('Y'), 1, 1);
            $datefin = clone $date;
            $datefin->add(new DateInterval('P1Y'))->setDate($datefin->format('Y'), 3, 15);
            $idetatdepayement = 4;
            $idetatvalidation = 3;
            DB::insert('insert into detail_declaration(id,iddeclaration,montant_a_recouvrire,datedebut,datefin,idetatpayement,idetatvalidation)values(seq_detail_declaration.nextval,?,?,?,?,?,?)', [$iddeclaration, $montant_a_recouvrire, $datedebut->format('Y-m-d'), $datefin->format('Y-m-d'), $idetatdepayement,$idetatvalidation]);
            DB::commit();
        }
        return redirect('/listedescharge');
    }
}

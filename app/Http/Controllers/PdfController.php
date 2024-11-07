<?php

namespace App\Http\Controllers;

use App\Models\Contribuable;
use App\Models\Payement;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function GenerePdf(){
        $idcontribuable=session('contribuable_id');
        $contribuable=Contribuable::where('id',$idcontribuable)->first();
        $detailbancaire=Payement::where('idcontribuable',$idcontribuable)->first();
        $logo=public_path('img\logodgi.jpg');
        $pdf=FacadePdf::loadview('ordre-de-virement',compact('contribuable','logo','detailbancaire'));
        return $pdf->download('ordre-de-virement.pdf');

    }
}

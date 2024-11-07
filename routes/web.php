<?php

use App\Http\Controllers\ContribuableController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\DetailDeclarationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VirementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('confirmation');
});
Route::get('/pdf', function () {
    return view('ordre-de-virement');
});
Route::get('/contribuable', [ContribuableController::class,'Allcontribuable']);
Route::get('/backoffice', function(){return view('verification');});
Route::get('/ajoutcontribuable', [ContribuableController::class,'AjoutContribuable']);
Route::get('/verification', [UtilisateurController::class,'VerificationUtilisateur']);
Route::get('/ajoutdeclaration', [DeclarationController::class,'AjoutDeclaration']);
Route::get('/ajoutdetaildeclaration', [DeclarationController::class,'AjoutDetailDeclaration']);
Route::get('/listedescharge', [DetailDeclarationController::class,'ListeDesCharge']);
Route::get('/choixchargeapayer', [DetailDeclarationController::class,'ChoixContribuable']);
Route::get('/choixmodedepayement', [DetailDeclarationController::class,'ChoixModePayement']);
Route::get('/virementbancaire', [VirementController::class,'InformationVirement']);
Route::get('/generepdf', [PdfController::class,'GenerePdf']);
Route::get('/email', [MailController::class,'bar']);
Route::get('/confirmation', [ContribuableController::class,'ConfirmationContribuable']);
Route::get('/lecturechoix', [DetailDeclarationController::class,'LectureChoix']);
Route::get('/validationpayement/{id}', [DetailDeclarationController::class,'Validationpayement']);

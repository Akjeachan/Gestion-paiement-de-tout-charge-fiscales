<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hetra_online</title>
</head>
<body>
    <h2>virement bancaire</h2>
<form action="/virementbancaire" method="get">
<label for="">nif du payeur</label>
<input type="text" value="{{$contribuable->nif}}" disabled>
<label for="">titulaire du compte</label>
<input type="text" value="{{$contribuable->nom}} {{$contribuable->prenom}}" disabled>
<label for=""> montant</label>
<input type="text" value="{{$montant_payer}}" disabled>
<label for=""> numero de compte du payeur(RIB)</label>
<div>
    <input type="text" name="fourniseur">
    <label for="">codebanque</label>
    <input type="text" name="codefourniseur">
    <label for="">codeagence</label>
    <input type="text" name="numerocontribuable">
    <label for="">numerpdecompte</label>
    <input type="text" name="cle">
    <label for="">clerib</label>
    <input type="submit" value="valider">
</div>
</form>
</body>
</html>

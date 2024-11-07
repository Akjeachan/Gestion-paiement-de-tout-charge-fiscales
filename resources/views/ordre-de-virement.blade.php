<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hetra_online</title>
    <style>
        table{
            width: 100%
            border-collapse:collapse;
        }
        table, th, td{
            border: 1px solid black;
        }
        th, td{
            padding:10px
        }
       .box {
        width: 300px;
        padding: 20px;
        margin: 20px auto;
        border: 2px solid #1B1B1BFF; /* Bordure noire */
        border-radius: 8px; /* Coins arrondis */
        background-color: #f9f9f9; /* Arrière-plan léger */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Ombre légère */
        text-align: center;
    }
    </style>
</head>
<body>
    <h2 style="text-align: center">Ordre de virement</h2>
    <div class="box">   <p>nif : {{$contribuable->nif}}</p>
        <p>Nom commercial : {{$contribuable->societe}}</p>
        <p>Raison sociale :</p>
        <p>Adresse :{{$contribuable->adresse}} </p>
        {{-- <p>Numero de Compte :{{$detailbancaire->fourniseur}} {{$detailbancaire->codefourniseur}} {{$detailbancaire->numerocontribuable}} {{$detailbancaire->cle}}</p> --}}
    </div>
    <h4 style="text-align: center">par le debit de mon compte, veuillez executer l'ordre de virement suivent</h4>
    <h4>Motif du virement :</h4>
    <h4 style="text-align: center">virer au credit du compte de </h4>
    <p>Nom et prenom : {{$contribuable->nom}} {{$contribuable->prenom}}</p>
    <p>Etablissement bancaire ou ccp :</p>
    <p>Numero de compte : </p>
    <h3>Total a virer</h3>
    <h4> Observations du donneur d'ordre</h4>
    <h4> Detail fiche de verification</h4>
    <table >
        <thead>
            <tr>
                <th style="border: 1px solid black">reference</th>
                <th style="border: 1px solid black">libelle</th>
                <th style="border: 1px solid black">periode</th>
                <th style="border: 1px solid black">type de transaction</th>
                <th style="border: 1px solid black">montant</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>

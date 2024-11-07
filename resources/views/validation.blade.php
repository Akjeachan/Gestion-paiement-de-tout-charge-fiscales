<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hetra_online</title>
</head>
<body>
<p>validation</p>
<table>
    <thead>
        <tr>
            <th>etat validation</th>
            <th>nif</th>
            <th>raison sociale</th>
            <th>rib</th>
            <th>montant</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->etatvalidation}}</td>
            <td>{{$item->nif}}</td>
            <td>{{$item->societe}}</td>
            <td>{{$item->founiseur}}{{$item->codefourniseur}}{{$item->numerocontribuable}}{{$item->cle}}</td>
            <td>{{$item->montant_payer}}</td>
            <td><a href="/validationpayement/{{$item->iddeclaration}}">valider</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>

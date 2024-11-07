<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hetra_online</title>
</head>
<body>
    <h2>Declaration</h2>
<form action="/ajoutdeclaration" method="get">
<label for="">contribuable</label>

        <input placeholder="{{$item->nom}} {{$item->prenom}}" value="{{$item->id}}"  name="idcontribuable" readonly>

<select name="idtypetaxe">
    @foreach ($data2 as $item2)
        <option value="{{$item2->id}}">{{$item2->taxe}}</option>
    @endforeach
</select>
<label for="">datedeclaration</label>
<input type="date" name="datedeclaration">
<label for="">montant</label>
<input type="number" step="0.01" name="montant">
<input type="submit" value="cree">
</form>
<a href="/listedescharge">liste des charge</a>
</body>
</html>

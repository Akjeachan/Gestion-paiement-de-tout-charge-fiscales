<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hetra_online</title>
</head>
<body>
<h2>verification</h2>
<form action="/verification" method="get">
<label for="">identifiant</label>
<input type="text" name="identifiant">
<label for="">password</label>
<input type="password" name="password">
<input type="submit" value="verifier">
@if (@session('error'))
<div>{{session('error')}}</div>
@endif
</form>
</body>
</html>

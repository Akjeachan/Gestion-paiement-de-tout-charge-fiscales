<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hetra_online</title>
</head>

<body>
    <form action="/choixchargeapayer" method="get">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" id="SelectAll" onclick="All(this)">
                    </th>
                    <th>montant</th>
                    <th>du</th>
                    <th>au</th>
                    <th>etatdepayement</th>
                    <th>nom</th>
                    <th>nif</th>
                    <th>payer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td><input type="checkbox" value="{{ $item->iddeclaration }}" id="option" class="option"
                                name="select[]" onclick="toggleInput(this)"></td>
                        <td>{{ $item->montant_a_recouvrire }}</td>
                        <td>{{ $item->datedebut }}</td>
                        <td>{{ $item->datefin }}</td>
                        <td>{{ $item->etat }}</td>
                        <td>{{ $item->nom }}</td>
                        <td>{{ $item->nif }}</td>
                        <td><input type="text" name="montantpayer[]" disabled></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <input type="submit" value="valider">
    </form>
    <script>
         function toggleInput(checkbox) {
            const inputField = checkbox.closest('tr').querySelector('input[type="text"]');

            // Activer ou désactiver le champ en fonction de l'état de la case à cocher
            inputField.disabled = !checkbox.checked;
            if (!checkbox.checked) {
                inputField.value = ''; // Effacer la valeur si la case est décochée
            }
        }
        function All(selectAllcheckbox) {
            const checkboxes = document.querySelectorAll('.option');
            checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAllcheckbox.checked;
                const inputField = checkbox.closest('tr').querySelector('input[type="text"]');
                inputField.disabled = !checkbox.checked;

            });
        }
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notificação de E-mail</title>
    <style>
        * { font-family: Arial, Helvetica, sans-serif; }
    </style>
</head>
<body>
    <h1>Olá, tudo bem?</h1>
    <h3>Os seguintes bolos estão disponíveis.</h3>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nome do bolo</th>
                <th>Peso <small>(em gramas)</small></th>
                <th>Valor</th>
                <th>Qtde disponível</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cakes as $cake)
                <tr>
                    <td>{{ $cake->name }}</td>
                    <td>{{ $cake->weight }}</td>
                    <td>R$ {{ number_format($cake->value, 2, ',', '.') }}</td>
                    <td>{{ $cake->amount }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

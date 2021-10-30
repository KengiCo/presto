<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <h1>Salve signor cliente</h1>
    <ul>
        <li>Nome: {{$contact['name']}}</li>
        <li>Email: {{$contact['email']}}</li>
        <li>Telefono: {{$contact['phone']}}</li>
    </ul>
    Ha scritto questo messaggio:
    <p>{{$contact['body']}}</p>
</body>
</html>

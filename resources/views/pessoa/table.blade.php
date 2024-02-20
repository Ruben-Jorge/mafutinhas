<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de pessoas</title>
</head>
<body>
    {{-- {{ var_dump($pessoas) }} --}}
    <h2>Lista de Pessoas</h2>
    <table>
        <thead>
            <th>Id</th>
            <th>Nome completo</th>
            <th>Idade</th>
            <th>Data de registo</th>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
            <tr>
                <td>{{$pessoa->id}}</td>                
                <td>{{$pessoa->nome}}</td>                
                <td>{{$pessoa->nascimento}}</td>                
                <td>{{$pessoa->created_at}}</td>                
            </tr>
            @endforeach
            
        </tbody>
    </table>
</body>
</html>
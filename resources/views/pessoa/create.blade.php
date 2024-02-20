<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Nova Pessoa</title>
</head>
<body>
    <h3>Dados da Pessoa</h3>
    <form action="/pessoas/store" method="post" name="pessoa">
        @csrf
        {{-- @method('post') --}}
        <div>
            <label for="nome">Nome: </label>
            <input type="text" maxlength='30'id='nome' name="nome">
        </div>
        <br>
        <div>
            <label for="nascimento">Nascimento: </label>
            <input type="date" id='nascimento' class="" name="nascimento">
        </div>
        <div>
            <button type="submit">cadastrar</button>
        </div>
    </form>
</body>
</html>
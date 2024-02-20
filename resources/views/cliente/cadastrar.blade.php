@extends('layout.app')
@section('titulo')
    Cadastrar Cliente
@endsection
@section('content')
<div class="row card">
    <div class="col-12  mb-4 card-head bg-info text-center">
        <h4 class="card-title"><i class="fa fa-plus"></i> INSERIR NOVO CLIENTE </h4>
    </div>
    <div class="col-12 card-body">
        <form action="{{'/cliente/salvar'}}" method="post">
            @csrf
            {{-- dados da cliente --}}
            <div class="row">
                <div class="col-6 form-group">
                    <label for="nome" class="form-label">Nome Completo: </label>
                    <input type="text" class="form-control" placeholder="Nome Completo" name="nome_completo" id='nome'>
                </div>
                <div class="col-6 form-group">
                    <label for="nascimento" class="form-label">Data de Nascimento: </label>
                    <input type="date" class="form-control" placeholder="nascimento" name="nascimento" id="nascimento">
                </div>
            </div>
            {{-- dados de endereco do cliente --}}
            <div class="row">
                <div class="col-6 ">
                    <label for="provincia" class="form-label">Provincia: </label>
                    <input type="text" class="form-control" placeholder="Província" id='provincia' name="provincia">
                </div>
                <div class="col-6 ">
                    <label for="municipio" class="form-label">Municipio: </label>
                    <input type="text" class="form-control" placeholder="municipio" id='municipio' name="municipio">
                </div>
                <div class="col-4 ">
                    <label for="bairro" class="form-label">Bairro: </label>
                    <input type="text" class="form-control" placeholder="Bairro" id='bairro' name="bairro">
                </div>
                <div class="col-4 ">
                    <label for="rua" class="form-label">Rua: </label>
                    <input type="text" class="form-control" placeholder="Rua" id='rua' name="rua">
                </div>
                <div class="col-4 ">
                    <label for="num_casa" class="form-label">Número da casa: </label>
                    <input type="text" class="form-control" placeholder="Número da casa" id='num_casa' name="num_casa">
                </div>
            </div>
            {{-- dados de contacto do cliente --}}
            <div class="row">
                <div class="col-4">
                    <label for="tel1" class="form-label">Telefone: </label>
                    <input type="text" class="form-control" placeholder="9xx xyz xyz" id='tel1' name="telemovel1">
                </div>
                <div class="col-4">
                    <label for="tel2" class="form-label">Telefone Alternativo: </label>
                    <input type="text" class="form-control" placeholder="9xx xyz xyz" id='tel2' name="telemovel2">
                </div>
                <div class="col-4">
                    <label for="email" class="form-label">Email: </label>
                    <input type="email" class="form-control" placeholder="abcd@meuemail.com" id='email' name="email">
                </div>
            </div>
            <div class="row btn-control mt-4 ">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-lg btn-success  ">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
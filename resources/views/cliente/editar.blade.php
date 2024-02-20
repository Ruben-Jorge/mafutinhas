@extends('layout.app')
@section('titulo')
    Alterar Dados do Cliente
@endsection
@section('content')
<div class="row card ">
    <div class="col-12">
        <div class="card-head bg-warning text-center ">
            <h4 class="p-2 ">ALTERAR DADOS DO CLIENTE <i class="fa fa-edit"></i></h4>
        </div>
        <div class="card-body">
            <form action="{{ route('actualizarCliente', ['cliente'=>$cliente->cliente_id]) }}" method="post">
                @csrf
                {{-- dados da cliente --}}
                <div class="row">
                    <div class="col-6 form-group">
                        <label for="nome" class="form-label">Nome Completo: </label>
                        <input type="text" class="form-control" value="{{$cliente->pessoa->nome_Completo}}" name="nome_completo" id='nome'>
                    </div>
                    <div class="col-6 form-group">
                        <label for="nascimento" class="form-label">Data de Nascimento: </label>
                        <input type="date" class="form-control" value="{{$cliente->pessoa->nascimento}}" name="nascimento" id="nascimento">
                    </div>
                </div>
                {{-- dados de endereco do cliente --}}
                <div class="row">
                    <div class="col-6 ">
                        <label for="provincia" class="form-label">Provincia: </label>
                        <input type="text" class="form-control" value="{{$cliente->pessoa->contacto->endereco->provincia}}" id='provincia' name="provincia">
                    </div>
                    <div class="col-6 ">
                        <label for="municipio" class="form-label">Municipio: </label>
                        <input type="text" class="form-control" value="{{$cliente->pessoa->contacto->endereco->municipio}}" id='municipio' name="municipio">
                    </div>
                    <div class="col-4 ">
                        <label for="bairro" class="form-label">Bairro: </label>
                        <input type="text" class="form-control" value="{{$cliente->pessoa->contacto->endereco->bairro}}" id='bairro' name="bairro">
                    </div>
                    <div class="col-4 ">
                        <label for="rua" class="form-label">Rua: </label>
                        <input type="text" class="form-control" value="{{$cliente->pessoa->contacto->endereco->rua}}" id='rua' name="rua">
                    </div>
                    <div class="col-4 ">
                        <label for="num_casa" class="form-label">Número da casa: </label>
                        <input type="text" class="form-control" value="{{$cliente->pessoa->contacto->endereco->numero_casa}}" id='num_casa' name="num_casa">
                    </div>
                </div>
                {{-- dados de contacto do cliente --}}
                <div class="row">
                    <div class="col-4">
                        <label for="tel1" class="form-label">Telefone: </label>
                        <input type="text" class="form-control" value="{{$cliente->pessoa->contacto->telemovel1}}" placeholder="9xx xyz xyz" id='tel1' name="telemovel1">
                    </div>
                    <div class="col-4">
                        <label for="tel2" class="form-label">Telefone Alternativo: </label>
                        <input type="text" class="form-control" value="{{$cliente->pessoa->contacto->telemovel2}}" placeholder="9xx xyz xyz" id='tel2' name="telemovel2">
                    </div>
                    <div class="col-4">
                        <label for="email" class="form-label">Email: </label>
                        <input type="email" class="form-control" value="{{$cliente->pessoa->contacto->email}}" placeholder="abcd@meuemail.com" id='email' name="email">
                    </div>
                </div>
                <div class="row btn-control mt-4 card-footer">
                    <div class="col-6 text-center mt-1">
                        <button type="submit" class=" col-12 btn btn-lg btn-success "><i class="fa fa-check"></i> Actualizar</button>
                    </div>
                    <div class="col-6 mt-1 text-center">
                        <button type="button" class=" col-12 btn btn-lg btn-danger "><i class="fa fa-cancel"></i> Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
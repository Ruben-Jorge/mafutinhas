@extends('layout.app')
{{-- definindo a variavel contadora de clientes --}}
@php
    $cont=0;
@endphp
@section('titulo')
    Lista  de Clientes
@endsection
@section('content')
<div class="row ">
    <div class="col-12 mb-4 card  card-head bg-info text-center">
        <h4 class=" "><i class="fa fa-list"></i> LISTA DE CLIENTE </h4>
    </div>
    <div class="col-12">
        <a href="{{ route('novoCliente') }}" class="btn btn-primary btn-sm"> <i class="fas  fa-plus"></i> Novo Cliente</a>
    </div>
    <div class="col-12 ">
        <div class="card ">
            <table class="table table-hover table-striped ">
                <thead class="card-head bg-info text-center">
                    <th>#</th>
                    <th>NOME COMPLETO</th>
                    <th>DATA NASC.</th>
                    <th>EMAIL</th>
                    <th>TEL</th>
                    {{-- <th> ALTERNATIVO</th> --}}
                    <th>PROVÍNCIA</th>
                    <th>MUNICÍPIO</th>
                    {{-- <th>BAIRRO</th>
                    <th>RUA</th>
                    <th>Nº CASA</th> --}}
                    <th>Acção</th>
                </thead>
                <tbody class="bg-grey text-center">
                    
                    @foreach ($clientes as $cliente)
                    @php
                        $nome       = $cliente->find($cliente->pessoa_id)->pessoa->nome_Completo;
                        $nascimento = $cliente->find($cliente->pessoa_id)->pessoa->nascimento;
                        $email      = $cliente->find($cliente->pessoa_id)->pessoa->pessoa_id;
                        $pessoa =$cliente->find($cliente->pessoa_id)->pessoa;
                    @endphp
                    <tr>
                        <td>{{++$cont}}</td>
                        <td>{{$nome}}</td>
                        <td>{{$nascimento}}</td>
                        <td>{{$pessoa->contacto->email}}</td>
                        <td>{{$pessoa->contacto->telemovel1}}</td>
                        {{-- <td>{{$pessoa->contacto->telemovel2}}</td> --}}
                        <td>{{$pessoa->contacto->endereco->provincia}}</td>
                        <td>{{$pessoa->contacto->endereco->municipio}}</td>
                        {{-- <td>{{$pessoa->contacto->endereco->bairro}}</td>
                        <td>{{$pessoa->contacto->endereco->rua}}</td>
                        <td>{{$pessoa->contacto->endereco->numero_casa}}</td>--}}
                        <td>
                            <form action="{{ route('editarCliente', ['cliente'=>$cliente->cliente_id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <a href="{{ route('editarCliente', ['cliente'=>$cliente->cliente_id]) }}" class="btn btn-warning btn-sm" ata-toggle="tooltip" data-placement="top-center" title="Editar os dados de {{$nome}}"><Strong><i class="{{'fa-solid fa-edit'}}"></i> </Strong></a>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        
                                        <a href="{{ route('eliminarCliente', ['cliente'=>$cliente->cliente_id]) }}" class="btn btn-danger btn-sm text-dark" ><i class="{{'fa-solid fa-trash'}}"></i></a>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
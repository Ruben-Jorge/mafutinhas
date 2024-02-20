<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contacto;
use App\Models\Endereco;
use App\Models\Pessoa;
use Illuminate\Http\Request;



class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::get();
        
        // return $clientes;
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // return $contacto;
        return view('cliente.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ================= Criando novas instancias =============================================
        $contacto   = new Contacto();
        $endereco   = new Endereco();
        $pessoa     = new Pessoa();
        $cliente    = new Cliente();

        // =========================================================================================
        // ================= Atribuindo os dados de endereco =======================================
        $endereco->provincia    = $request->provincia;
        $endereco->municipio    = $request->municipio;
        $endereco->bairro       = $request->bairro;
        $endereco->rua          = $request->rua;
        $endereco->numero_casa  = $request->num_casa==null?'Não identificado':$request->num_casa;

        // =========================================================================================
        // ================ salvando o endereco do cliente =================================
        $endereco->save();

        //=========================================================================================
        //================= pegando o id do ultimo endereco adicionado =====================
        $endereco_id= $endereco->get()->last()->endereco_id;

        //=========================================================================================
        // ================= Atribuindo os dados de contacto =======================================
        $contacto->telemovel1=$request->telemovel1;
        $contacto->telemovel2=$request->telemovel2;
        $contacto->email=$request->email;
        $contacto->endereco_id=$endereco_id;

        //=========================================================================================
        // ================ salvando o contacto do cliente =================================
        $contacto->save();
        //================= pegando o id do ultimo contacto adicionado =====================
        $contacto_id= $contacto->get()->last()->contacto_id;

        //=========================================================================================
        // ================= Atribuindo os dados do cliente =======================================
        $pessoa->nome_completo = $request->nome_completo;
        $pessoa->nascimento = $request->nascimento;
        $pessoa->contacto_id=$contacto_id;

        // ================ salvando dados do cliente =================================
        $pessoa->save();
        //=========================================================================================
        //================= pegando o id da ultima pessoa adicionada =====================
        $pessoa_id= $pessoa->get()->last()->pessoa_id;
        $cliente->pessoa_id = $pessoa_id;

        // ================ salvando o cliente =================================
        $cliente->save();
        //=========================================================================================
        return redirect()->route('listarClientes');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit( $cliente_id)
    {
        //
        $cliente = new Cliente;
        $cliente =$cliente->find($cliente_id);
        return view('cliente.editar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $cliente_id)
    {
        $cliente = new Cliente;
        $cliente =$cliente->find($cliente_id);
        // atribuindo os dados
        // ====================================================
        //                      Dados da Endereco
        // ====================================================
        $endereco = $cliente->pessoa->contacto->endereco;
        $endereco->provincia = $request->provincia;
        // return $endereco;
        $endereco->municipio = $request->municipio;
        $endereco->bairro = $request->bairro;
        $endereco->rua = $request->rua;
        $endereco->numero_casa = $request->num_casa;
        $endereco->save();
        // return $endereco;
        // ====================================================
        //                      Dados da contacto
        // ====================================================
        $contacto = $cliente->pessoa->contacto;
        // return $contacto;
        $contacto->telemovel1= $request->telemovel1;
        $contacto->telemovel2= $request->telemovel2;
        $contacto->email= $request->email;
        $contacto->save();
        // return $contacto;
        // ====================================================
        //                      Dados da pessoa
        // ====================================================
        $pessoa                         = $cliente -> pessoa;
        $pessoa     ->  nome_completo   = $request -> nome_completo;
        $pessoa     ->  nascimento      = $request -> nascimento;
        $status = $pessoa     ->  save();
        dd($cliente);
        return redirect()->route('listarClientes',compact('status'));
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente)
    {
        $cliente=Cliente::find($cliente);
        
        $status = $cliente->delete();
        return redirect()->route('listarClientes',compact('status'));
    }
} 

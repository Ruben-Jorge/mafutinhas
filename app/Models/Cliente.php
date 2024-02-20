<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $primaryKey='cliente_id';
    
    // metodo que busca dados de um (cliente) na tabela pessoa relacionamento é um 
    public function pessoa(){
        return $this->hasOne(Pessoa::class,'pessoa_id','pessoa_id');
    }
}

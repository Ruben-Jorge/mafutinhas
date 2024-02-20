<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $primaryKey='contacto_id';

    // metodo que busca endereco de uma pessoa na tabela endereco relacionamento tem um 
    public function endereco() {
        return $this->hasOne(Endereco::class, 'endereco_id', 'endereco_id');
     }

}

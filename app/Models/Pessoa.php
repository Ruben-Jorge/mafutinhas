<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $primaryKey='pessoa_id';   
    

    // metodo que busca contacto de uma pessoa na tabela Cliente relacionamento tem um 
    public function contacto() {
       return $this->hasOne(Contacto::class, 'contacto_id', 'contacto_id');
    }
}
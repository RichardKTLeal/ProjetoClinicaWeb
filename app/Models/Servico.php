<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'valor', 'descricao'];

    public function atendimentos()
    {

    return $this->hasMany(Atendimento::class);
    
    }


    public function deleteWithAtendimentos()
    {

    $this->atendimentos()->delete();
    $this->delete();

    }

}

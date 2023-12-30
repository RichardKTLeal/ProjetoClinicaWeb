<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }
    
    // public function pacientes()
    // {
    //     return $this->hasMany(Paciente::class);
    // }
    
    public function servico() {
        return $this->belongsTo(Servico::class);
    }

 
}

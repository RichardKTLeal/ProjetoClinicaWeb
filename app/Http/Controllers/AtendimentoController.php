<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Atendimento;
use App\Models\Paciente;
use App\Models\Servico;

class AtendimentoController extends Controller
{

    public function index() {
        
        $atendimentos = Atendimento::with('paciente', 'servico')->get();
        return view('atendimentos', ['atendimentos' => $atendimentos]);

    }

    public function create(){
        $servicos = Servico::all();
        $pacientes = Paciente::all();

        return view('events.createAtendimento', ['servicos' => $servicos, 'pacientes' => $pacientes]);
   }

    public function store(Request $request) {
        $atendimento = new Atendimento;
        $atendimento->paciente_id = $request->paciente_id;
        $atendimento->servico_id = $request->servico;
        $atendimento->user_id = auth()->id();
    
        $atendimento->save();
    
        return redirect('/atendimentos/show');
    }


    public function destroy($id) {
        Atendimento::findOrFail($id)->delete();

        return redirect('/atendimentos/show')->with('concluido', 'humm, humm, espero que volte!');

    }
    

}
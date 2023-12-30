<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Servico;

class ServicoController extends Controller
{

    public function index() {
        $servicos = Servico::all();
        return view('servicos', ['servicos' => $servicos]);
    }

    public function create() {
        return view('events.createServicos');
    }

   public function store(Request $request) {

        $request->validate([
            'nome' => 'required|min:3|max:100',
            'valor' => 'required|numeric',
            'descricao' => 'required|min:3|max:1000'
        ]);

        $servico = new Servico;
        $servico->nome = $request->nome;
        $servico->valor = $request->valor;
        $servico->descricao = $request->descricao;

        $servico->save();

        return redirect('/meusservicos');
    }

    public function destroy($id) {

        $servico = Servico::findOrFail($id);
 
        if ($servico->atendimentos()->count() > 0) {
            return redirect('/meusservicos')->with('msg', 'Não é possível excluir o servico, pois está em uso!');
        }
 
        $servico->deleteWithAtendimentos();
 
        return redirect('/meusservicos')->with('concluido', 'Servico excluido.');
    }


    public function editar($id) {
        $servico = Servico::findOrFail($id);
        return view('events.editarServicos', ['servico' => $servico]);
    }

    public function atualizar(Request $request, $id) {
        // dd($request->all());
        $servico = Servico::findOrFail($id);
        $servico->nome = $request->nome;
        $servico->valor = $request->valor;
        $servico->descricao = $request->descricao;
        $servico->user_id = auth()->id();
        $servico->save();
        
        return redirect('/meusservicos');
    }

}

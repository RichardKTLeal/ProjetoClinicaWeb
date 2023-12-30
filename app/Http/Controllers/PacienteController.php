<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Formatter;
use Illuminate\Http\Request;
use App\Models\Paciente;

use function Laravel\Prompts\search;

class PacienteController extends Controller
{
   public function index() {

     $search = request('search');

     if ($search) {
          
          $pacientes = Paciente::where([
               ['nome', 'like', '%' . $search . '%']
          ])->get();

     }else{
          $pacientes = Paciente::all();
     }
     
     return view('pacientes', ['pacientes' => $pacientes, 'search' => $search]);

   }

   public function create(){
        return view('events.create');
   }

   public function store(Request $request) {
     $request->validate([
         'nome' => 'required',
         'data' => 'required',
         'sexo' => 'required',
         'descricao' => 'required',
         'telefone' => 'required',
         'email' => 'required|email',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);
 
     $paciente = new Paciente;
     $paciente->nome = $request->nome;
     $paciente->data = $request->data;
     $paciente->sexo = $request->sexo;
     $paciente->descricao = $request->descricao;
 
     $paciente->telefone = $request->telefone; 
     $paciente->email = $request->email;
     $paciente->user_id = auth()->id();
 
     if ($request->hasFile('image') && $request->file('image')->isValid()) {
         $requestImage = $request->image;
 
         $extension = $requestImage->extension();
         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
 
         $requestImage->move(public_path('img/paciente'), $imageName);
 
         $paciente->image = $imageName;
     }
 
     $paciente->save();
 
     return redirect('/')->with('concluido', 'Cadastro concluído com sucesso');
 }
 
     public function show($id){
          $paciente = Paciente::findOrFail($id);
          return view('events.show', ['paciente' => $paciente]);
     
     }


     public function destroy($id) 
     {
         $paciente = Paciente::findOrFail($id);
 
         if ($paciente->atendimentos()->count() > 0) {
             return redirect('/')->with('msg', 'Uau, uau, estou sendo atendido no momento!');
         }
 
         $paciente->deleteWithAtendimentos();
 
         return redirect('/')->with('concluido', 'humm, humm, espero voltar!');
     }

     public function editar($id) {
          $paciente = Paciente::findOrFail($id);
          return view('events.editarPaciente', ['paciente' => $paciente]);
    }

    public function atualizar(Request $request, $id) {
     $paciente = Paciente::findOrFail($id);
     $paciente->nome = $request->nome;
 
     try {
         $dataFormatada = Carbon::createFromFormat('d/m/Y', $request->data);
     } catch (\Exception $e) {
         return redirect()->back()->withErrors(['data' => 'Formato de data inválido.']);
     }
 
     $paciente->data = $dataFormatada->format('Y-m-d');
 
     $paciente->sexo = $request->sexo;
     $paciente->descricao = $request->descricao;
 
     $telefoneFormatado = Formatter::phone($request->telefone, 'BR', 'mobile');
     $paciente->telefone = $telefoneFormatado;
 
     $paciente->email = $request->email;
     $paciente->save();
 
     return redirect('/')->with('editar', 'Paciente editado.');
 }
     

}
    
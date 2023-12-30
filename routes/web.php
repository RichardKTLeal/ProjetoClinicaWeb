<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\AtendimentoController;
use App\Models\Atendimento;
use App\Models\Paciente;
use App\Models\Servico;

Route::get('/', [PacienteController::class, 'index']) -> middleware('auth');
Route::get('/pacientes/create', [PacienteController::class, 'create']) -> middleware('auth');
Route::get('/pacientes/{id}', [PacienteController::class, 'show']) -> middleware('auth');
Route::post('/pacientes', [PacienteController::class, 'store']) -> middleware('auth');
Route::patch('/paciente/editar/{id}', [PacienteController::class, 'editar']) -> middleware('auth');
Route::patch('/paciente/atualizar/{id}', [PacienteController::class, 'atualizar']) -> middleware('auth');
Route::delete('/paciente/delete/{id}', [PacienteController::class, 'destroy']) -> middleware('auth');

Route::get('/meusservicos', [ServicoController::class, 'index']) -> middleware('auth');
Route::get('/servicos/create', [ServicoController::class, 'create']) -> middleware('auth');
Route::post('/servicos', [ServicoController::class, 'store']) -> middleware('auth');
Route::patch('/servico/editar/{id}', [ServicoController::class, 'editar']) -> middleware('auth');
Route::patch('/servico/atualizar/{id}', [ServicoController::class, 'atualizar']) -> middleware('auth');
Route::delete('/servico/delete/{id}', [ServicoController::class, 'destroy']) -> middleware('auth');


Route::get('/atendimentos/show', [AtendimentoController::class, 'index']) -> middleware('auth');
Route::get('/atendimento/create', [AtendimentoController::class, 'create']) -> middleware('auth');
Route::post('/atendimentos', [AtendimentoController::class, 'store']) -> middleware('auth');
Route::patch('/atendimento/status/{atendimento}', [AtendimentoController::class, 'updateStatus']) -> middleware('auth');
Route::delete('/atendimento/delete/{id}', [AtendimentoController::class, 'destroy']) -> middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\EmployeeController;
use App\Http\Requests\createEmployeeRequest;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    // Rotas para o perfil do cliente
    Route::get('perfil/cliente', [ProfileController::class, 'indexCliente'])->name('perfil.cliente');
    Route::post('perfil/cliente/atualizar', [ProfileController::class, 'updateCliente'])->name('perfil.cliente.atualizar');
    Route::get('perfil/cliente/excluir-conta', [ProfileController::class, 'showDeleteConfirmation'])->name('perfil.cliente.excluir-confirmacao');
    Route::post('perfil/cliente/excluir-conta', [ProfileController::class, 'deleteAccount'])->name('perfil.cliente.excluir-conta');

    // Rotas para o perfil do petshop
    Route::get('perfil/petshop', [ProfileController::class, 'indexPetShop'])->name('perfil.petshop');
    Route::post('perfil/petshop/atualizar', [ProfileController::class, 'updatePetShop'])->name('perfil.petshop.atualizar');

    // Rotas para serviços
    Route::get('servicos', [ServiceController::class, 'index'])->name('servicos.index');
    Route::get('servicos/criar', [ServiceController::class, 'create'])->name('servicos.create');
    Route::post('servicos', [ServiceController::class, 'store'])->name('servicos.store');
    Route::get('servicos/{id}/editar', [ServiceController::class, 'edit'])->name('servicos.edit');
    Route::put('servicos/{id}', [ServiceController::class, 'update'])->name('servicos.update');
    Route::delete('servicos/{id}', [ServiceController::class, 'destroy'])->name('servicos.destroy');

    // Rotas para eventos
    Route::get('petshop/eventos', [EventController::class, 'index'])->name('petshop.eventos.index');
    Route::get('petshop/eventos/criar', [EventController::class, 'create'])->name('petshop.eventos.create');
    Route::post('petshop/eventos', [EventController::class, 'store'])->name('petshop.eventos.store');
    Route::get('petshop/eventos/{evento}/editar', [EventController::class, 'edit'])->name('petshop.eventos.edit');
    Route::put('petshop/eventos/{evento}', [EventController::class, 'update'])->name('petshop.eventos.update');
    Route::delete('petshop/eventos/{evento}', [EventController::class, 'destroy'])->name('petshop.eventos.destroy');

    //Rotas para funcionários
    Route::get('funcionarios', [EmployeeController::class, 'index'])->name('funcionarios.index');
    Route::get('funcionarios/criar', [EmployeeController::class, 'create'])->middleware('auth')->name('funcionarios.create');
    Route::post('funcionarios', [EmployeeController::class, 'store'])->name('funcionarios.store');
    Route::get('funcionarios/{id}/editar', [EmployeeController::class, 'edit'])->name('funcionarios.edit');
    Route::put('funcionarios/{id}', [EmployeeController::class, 'update'])->name('funcionarios.update');
    Route::delete('funcionarios/{id}', [EmployeeController::class, 'destroy'])->name('funcionarios.destroy');

    // Rota para a agenda
    Route::get('agendamentos', [AgendamentoController::class, 'index'])->name('agendamentos.index');
    Route::get('agendamentos/criar', [AgendamentoController::class, 'create'])->name('agendamentos.create');
    Route::post('agendamentos', [AgendamentoController::class, 'store'])->name('agendamentos.store');
    Route::get('agendamentos/{id}/editar', [AgendamentoController::class, 'edit'])->name('agendamentos.edit');
    Route::put('agendamentos/{id}', [AgendamentoController::class, 'update'])->name('agendamentos.update');
    Route::delete('agendamentos/{id}', [AgendamentoController::class, 'destroy'])->name('agendamentos.destroy');
});

Auth::routes();

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Employee;
use App\Models\Service;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::with('funcionario', 'servico')->get();
        return view('agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
        $funcionarios = Employee::all();
        $servicos = Service::all();

        return view('agendamentos.create', compact('funcionarios', 'servicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'funcionario_id' => 'required',
            'services_id' => 'required',
            'data' => 'required|date',
            'horario' => 'required',
        ]);

        Agendamento::create([
            'funcionario_id' => $request->input('funcionario_id'),
            'services_id' => $request->input('services_id'),
            'data' => $request->input('data'),
            'horario' => $request->input('horario'),
        ]);

        return redirect()->route('agendamentos.index');
    }

    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $funcionarios = Employee::all();
        $servicos = Service::all(); // Load all services

        if (!$agendamento) {
            return redirect()->route('agendamentos.index')->with('error', 'Agendamento não encontrado.');
        }

        return view('agendamentos.edit', compact('agendamento', 'funcionarios', 'servicos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'funcionario_id' => 'required',
            'services_id' => 'required',
            'data' => 'required|date',
            'horario' => 'required',
        ]);

        $agendamento = Agendamento::findOrFail($id);

        $agendamento->funcionario_id = $request->input('funcionario_id');
        $agendamento->services_id = $request->input('services_id');
        $agendamento->data = $request->input('data');
        $agendamento->horario = $request->input('horario');

        $agendamento->save();

        return redirect()->route('agendamentos.index');
    }

    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();
        
        return redirect()->route('agendamentos.index');
    }
}

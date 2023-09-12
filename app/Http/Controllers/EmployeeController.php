<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $funcionarios = Employee::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        $employee = new Employee();
        return view('funcionarios.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios',
            'telefone' => 'required|string|max:20',
        ]);

        Employee::create($request->all());

        return redirect()->route('funcionarios.index');
    }

    public function edit(int $id)
    {
        $funcionario = Employee::find($id);
        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(Request $request, int $id)
    {
        $employee = Employee::find($id);

        $this->validate($request, [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email,' . $employee->id,
            'telefone' => 'required|string|max:20',
        ]);

        $employee->update($request->all());

        return redirect()->route('funcionarios.index');
    }

    public function destroy(int $id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('funcionarios.index');
    }
}

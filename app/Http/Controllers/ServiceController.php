<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Agendamento;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('servicos.index', compact('services'));
    }

    public function create()
    {
        return view('servicos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|string', // Alterado para string devido à formatação
            'description' => 'nullable|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adicione a validação da imagem
        ]);

        // Processar a imagem, se foi enviada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/servicos', 'public');
            $data['image'] = $imagePath;
        }

        // Remover formatação da máscara e transformar em valor numérico
        $data['price'] = preg_replace('/[^\d]/', '', $data['price']);

        Service::create($data);

        return redirect()->route('servicos.index')->with('success', 'Serviço criado com sucesso.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('servicos.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Processar a imagem, se foi enviada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/servicos', 'public');
            $data['image'] = $imagePath;
        }

        // Remover formatação da máscara e transformar em valor numérico
        $data['price'] = str_replace(['R$', ' ', ','], '', $data['price']);
        $data['price'] = (float) str_replace(',', '.', $data['price']);

        $service->update($data);

        return redirect()->route('servicos.index')
            ->with('success', 'Serviço atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Excluir os agendamentos relacionados a este serviço
        $service->agendamentos()->delete();

        // Agora você pode excluir o serviço
        $service->delete();

        return redirect()->route('servicos.index')
            ->with('success', 'Serviço excluído com sucesso.');
    }
}

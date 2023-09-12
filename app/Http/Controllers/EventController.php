<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $eventos = Event::all();
        return view('eventos.index', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'data_hora' => 'required|after_or_equal:now',
        ]);

        Event::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_hora' => $request->data_hora,
        ]);

        return redirect()->route('petshop.eventos.index')->with('success', 'Evento criado com sucesso.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'data_hora' => 'required|after_or_equal:now',
        ]);

        $evento = Event::findOrFail($id);
        $evento->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_hora' => $request->data_hora,
        ]);

        return redirect()->route('petshop.eventos.index')->with('success', 'Evento atualizado com sucesso.');
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function edit(Event $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    public function destroy(Event $evento)
    {
        $evento->delete();
        return redirect()->route('petshop.eventos.index')->with('success', 'Evento excluído com sucesso!');
    }
}

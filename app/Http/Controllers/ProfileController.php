<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function indexCliente()
    {
        $user = Auth::user();
        return view('perfil.cliente.index', compact('user'));
    }

    public function updateCliente(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('perfil.cliente')->with('success', 'Perfil atualizado com sucesso.');
    }

    public function indexPetShop()
    {
        $user = Auth::user();
        return view('perfil.petshop.index', compact('user'));
    }

    public function updatePetShop(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('perfil.petshop')->with('success', 'Perfil atualizado com sucesso.');
    }

    public function showDeleteConfirmation()
    {
        return view('perfil.delete-confirmation');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'confirmation_phrase' => 'required|in:Excluir Conta',
        ]);

        Auth::logout();
        $user->delete();

        return redirect()->route('home');
    }
}

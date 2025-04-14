<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    // Exibir o formulário de registo do género do livro
    public function create()
    {
        return view('genres.create');
    }

    // Salvar o género
    public function save(Request $request)
    {
        $validated = $request->validate([
            'genero' => 'required|string|max:255',
        ]);

        Genero::create($validated);

        return redirect()->route('genres.create')->with('success', "Género Registado com sucesso!");
    }
}

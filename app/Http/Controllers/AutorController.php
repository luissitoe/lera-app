<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{

    public function create()
    {
        return view('authors.create');
    }

    public function save(Request $request)
    {
        $validated =  $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'date',
            'nacionalidade' => 'nullable|string|max:100',
            'biografia' => 'nullable|string',
        ]);

        Autor::create($validated);
        return redirect()->route('authors.create')->with('success', 'Autor registado com sucesso!');
    }
}

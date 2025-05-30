<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Http\Request;
use App\Factories\MetodoEntregaFactory; //Importar o Factory


use App\Builders\LivroDirector;
use App\Builders\LivroFisicoBuilder;
use App\Builders\LivroDigitalBuilder;
use App\Builders\LivroAudiobookBuilder;

class LivroController extends Controller
{

    // Listar os livros
    public function index(Request $request)
    {
        $query = Livro::with('autores', 'generos');
        if ($request->filled('formato')) {
            $query->where('formato', $request->formato);
        }

        $livros = $query->latest()->get();

        return view('books.index', compact('livros'));
    }
    // Exibir o formulário de registo de livros
    public function create()
    {
        $autores = Autor::all();
        $generos = Genero::all();
        return view('books.create', compact('autores', 'generos'));
    }

    // Salvar o livro
    public function save(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer|max:' . date('Y'),
            'isbn' => 'required|max:20|unique:livros,isbn',
            'descricao' => 'required|string',
            'imagem' => 'image|mimes:jpg,jpeg,png|max:2048',
            'formato' => 'required|in:fisico,digital,audiobook',
            'autores' => 'required|array|exists:autors,id',
            'generos' => 'required|array|exists:generos,id',
            'arquivo' => 'nullable|mimes:pdf,epub,mobi|max:10240',
            'peso' => 'nullable|numeric',
            'dimensoes' => 'nullable|string',
            'quantidade' => 'nullable|string',
            'narrador' => 'nullable|string',
            'tempo_duracao' => 'nullable|integer',
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('capas', 'public');
        }

        // Upload de arquivo digital
        if ($request->hasFile('arquivo')) {
            $validated['arquivo'] = $request->file('arquivo')->store('ebooks', 'public');
        }

        $director = new LivroDirector();

        $builder = match ($validated['formato']) {
            'fisico' => new LivroFisicoBuilder(),
            'digital' => new LivroDigitalBuilder(),
            'audiobook' => new LivroAudiobookBuilder(),
            default => throw new \Exception("Formato desconhecido"),
        };

        $livro = $director->build($builder, $validated);
        $livro->autores()->attach($request->autores);
        $livro->generos()->attach($request->generos);

        return redirect()->route('books.create')->with('success', 'Livro registado com sucesso!');
    }

    public function update(Request $request,)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer|max:' . date('Y'),
            'isbn' => 'required|max:20|unique:livros,isbn',
            'descricao' => 'required|string',
            'imagem' => 'image|mimes:jpg,jpeg,png|max:2048',
            'formato' => 'required|in:fisico,digital,audiobook',
            'autores' => 'required|array|exists:autors,id',
            'generos' => 'required|array|exists:generos,id',
        ]);

        /*$livro = (new LivroBuilder)
            ->setDados($validated)
            ->setImagem($request->file('imagem'))
            ->setAutores($request->autores)
            ->setGeneros($request->generos)
            ->build();*/

        /*   $livro = Livro::create($validated);
        $livro->autores()->attach($request->autores);
        $livro->generos()->attach($request->generos); */

        return redirect()->route('books.create')->with('success', 'Livro registado com sucesso!');
    }

    // Página de Detalhes do livro
    public function show($id)
    {
        $livro = Livro::with(['autores', 'generos'])->findOrFail($id);
        return view('books.show', compact('livro'));
    }

    public function edit($id)
    {
        $autores = Autor::all();
        $generos = Genero::all();
        $livro = Livro::with(['autores', 'generos'])->findOrFail($id);
        return view('books.edit', compact('livro'));
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return redirect()->back()->with('success', 'Deletado com Sucesso');
    }

    //USo do Method Factory no LivroController
    public function entregarLivro($id)
    {
        $livro = Livro::findOrFail($id);

        $metodoEntrega = MetodoEntregaFactory::criar($livro);
        $mensagemEntrega = $metodoEntrega->entregar($livro);

        return view('books.entrega', compact('livro', 'mensagemEntrega'));
    }
}

<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;
use App\Models\Livro;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $livros = Livro::with('autores', 'generos')->latest()->get();
    return view('welcome', compact('livros'));
})->name('home');

// Autores
Route::get('/authors/create', [AutorController::class, 'create'])->name('authors.create');
Route::post('/authors/save', [AutorController::class, 'save'])->name('authors.save');

// Géneros
Route::get('/genres/create', [GeneroController::class, 'create'])->name('genres.create');
Route::post('/genres/save', [GeneroController::class, 'save'])->name('genres.save');

// Livros 
Route::get('/books/index', [LivroController::class, 'index'])->name('books.index');
Route::get('/books/create', [LivroController::class, 'create'])->name('books.create');
Route::get('/books/show/{book}', [LivroController::class, 'show'])->name('books.show');
Route::post('/books/save', [LivroController::class, 'save'])->name('books.save');
Route::get('/books/edit/{livro}', [LivroController::class, 'edit'])->name('books.edit');
Route::delete('/books/destroy/{livro}', [LivroController::class, 'destroy'])->name('books.destroy');

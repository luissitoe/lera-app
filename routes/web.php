<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


Route::get('/', function (Request $request) {
    $livros = Livro::with('autores', 'generos')->latest()->get();
    return view('welcome', compact('livros'));
})->middleware(['auth', 'verified'])->name('home');

Route::post('logout', function () {
    Auth::logout();
    return redirect('/books.index');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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

Route::get('/books/{id}/entregar', [LivroController::class, 'entregarLivro'])->name('books.entregar');


require __DIR__ . '/auth.php';

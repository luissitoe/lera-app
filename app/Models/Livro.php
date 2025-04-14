<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Livro extends Model
{
    /** @use HasFactory<\Database\Factories\LivroFactory> */
    use HasFactory;

    protected $fillable = ['titulo', 'ano_publicacao', 'isbn', 'descricao', 'imagem', 'formato'];

    public function autores(): BelongsToMany
    {
        return $this->belongsToMany(Autor::class);
    }

    public function generos(): BelongsToMany
    {
        return $this->belongsToMany(Genero::class);
    }
}

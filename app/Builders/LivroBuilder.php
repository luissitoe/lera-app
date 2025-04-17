<?php

namespace App\Builders;

use App\Models\Livro;
use Illuminate\Http\UploadedFile;

class LivroBuilder
{
    protected $livro;

    public function criar(array $dados): self
    {
        $this->livro = new Livro($dados);
        return $this;
    }

    public function adicionarCamposEspecificos(array $dados): self
    {
        switch ($dados['formato']) {
            case 'fisico':
                $this->livro->peso = $dados['peso'] ?? null;
                $this->livro->dimensoes = $dados['dimensoes'] ?? null;
                $this->livro->quantidade = $dados['quantidade'] ?? null;
                break;

            case 'digital':
                $this->livro->arquivo = $dados['arquivo'] ?? null;
                break;

            case 'audiobook':
                $this->livro->narrador = $dados['narrador'] ?? null;
                $this->livro->tempo_duracao = $dados['tempo_duracao'] ?? null;
                break;
        }

        return $this;
    }

    public function guardar(): Livro
    {
        $this->livro->save();
        return $this->livro;
    }
}

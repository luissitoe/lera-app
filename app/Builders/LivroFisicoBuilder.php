<?php

namespace App\Builders;

use App\Models\Livro;

class LivroFisicoBuilder implements LivroBuilderInterface
{
    protected Livro $livro;

    public function setDadosBase(array $dados): void
    {
        $this->livro = new Livro($dados);
        $this->livro->formato = "fisico";
    }

    public function adicionarCamposEspecificos(array $dadosEspecificos): void
    {
        $this->livro->peso = $dadosEspecificos['peso'] ?? null;
        $this->livro->dimensoes = $dadosEspecificos['dimensoes'] ?? null;
        $this->livro->quantidade = $dadosEspecificos['quantidade'] ?? null;
    }

    public function salvar(): Livro
    {
        $this->livro->save();
        return $this->livro;
    }
}

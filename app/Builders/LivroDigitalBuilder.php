<?php

namespace App\Builders;

use App\Models\Livro;

class LivroDigitalBuilder implements LivroBuilderInterface
{
    protected Livro $livro;

    public function setDadosBase(array $dados): void
    {
        $this->livro = new Livro($dados);
        $this->livro->formato = "digital";
    }

    public function adicionarCamposEspecificos(array $dadosEspecificos): void
    {
        $this->livro->arquivo = $dadosEspecificos['arquivo'] ?? null;
    }

    public function salvar(): Livro
    {
        $this->livro->save();
        return $this->livro;
    }
}

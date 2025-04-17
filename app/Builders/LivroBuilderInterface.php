<?php

namespace App\Builders;

use App\Models\Livro;

interface  LivroBuilderInterface
{
    public function setDadosBase(array $dados): void;
    public function adicionarCamposEspecificos(array $dadosEspecificos): void;
    public function salvar(): Livro;
}

<?php

namespace App\Builders;

use App\Models\Livro;

class LivroAudiobookBuilder implements LivroBuilderInterface
{

    protected Livro $livro;

    public function setDadosBase(array $dados): void
    {
        $this->livro = new Livro($dados);
        $this->livro->formato = "audiobook";
    }

    public function adicionarCamposEspecificos(array $dadosEspecificos): void
    {
        $this->livro->narrador = $dadosEspecificos['narrador'] ?? null;
        $this->livro->tempo_duracao = $dadosEspecificos['tempo_duracao'] ?? null;
    }

    public function salvar(): Livro
    {
        $this->livro->save();
        return $this->livro;
    }
}

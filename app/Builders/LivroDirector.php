<?php

namespace App\Builders;

namespace App\Builders;

class LivroDirector
{
    public function build(LivroBuilderInterface $builder, array $dados)
    {
        $builder->setDadosBase($dados);
        $builder->adicionarCamposEspecificos($dados);
        return $builder->salvar();
    }
}

<?php

namespace App\Services\Entrega;

use App\Contracts\MetodoEntregaInterface;
use App\Models\Livro;


class EntregaDigital implements MetodoEntregaInterface
{
    /**
     * Create a new class instance.
     */
    public function entregar(Livro $livro): string
    {
        return "Livro em pdf disponivel em ". asset('storage/' . $livro->arquivo); // ou gerar link temporário
    }
}

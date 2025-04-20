<?php

namespace App\Services\Entrega;

use App\Contracts\MetodoEntregaInterface;
use App\Models\Livro;

class EntregaFisica implements MetodoEntregaInterface
{
    /**
     * Create a new class instance.
     */
    public function entregar(Livro $livro): string
    {
        return "O livro será enviado para o endereço cadastrado. Peso: {$livro->peso}, Quantidade: {$livro->quantidade}, Dimensões: {$livro->dimensoes}";
    }
}

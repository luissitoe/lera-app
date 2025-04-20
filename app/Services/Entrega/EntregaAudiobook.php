<?php

namespace App\Services\Entrega;

use App\Contracts\MetodoEntregaInterface;
use App\Models\Livro;

class EntregaAudiobook implements MetodoEntregaInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }
    public function entregar(Livro $livro): string
    {
        return "Audio disponível em: " . asset('audio/' . $livro->arquivo);
    }
}

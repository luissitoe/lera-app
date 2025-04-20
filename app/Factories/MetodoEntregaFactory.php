<?php

namespace App\Factories;


use App\Models\Livro;
use App\Contracts\MetodoEntregaInterface;
use App\Services\Entrega\EntregaDigital;
use App\Services\Entrega\EntregaFisica;
use App\Services\Entrega\EntregaAudiobook;

class MetodoEntregaFactory
{
    /**
     * Create a new class instance.
     */
    public static function criar(Livro $livro): MetodoEntregaInterface
    {
        return match($livro->formato) {
            'digital' => new EntregaDigital(),
            'fisico' => new EntregaFisica(),
            'audiobook' => new EntregaAudiobook(),
            default	=> throw new \InvalidArgumentException("Formato de Entrga desconhecido"),
        };
    }
}

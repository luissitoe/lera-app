<?php

namespace App\Contracts;

interface MetodoEntregaInterface
{
    public function entregar(\App\Models\Livro $livro): string;
}

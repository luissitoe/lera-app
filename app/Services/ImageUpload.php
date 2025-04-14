<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Facades\Storage;

class ImageUpload
{
    private static ?ImageUpload $instancia = null;

    private function __construct() {}

    public static function getInstancia(): ImageUpload
    {
        if (self::$instancia === null) {
            self::$instancia = new ImageUpload();
        }

        return self::$instancia;
    }

    public function salvarImagem(UploadedFile $imagem, string $pasta = 'capas'): string
    {
        return $imagem->store($pasta, 'public');
    }
}

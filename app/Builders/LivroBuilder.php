<?php

namespace App\Builders;

use App\Models\Livro;
use Illuminate\Http\UploadedFile;
use PhpParser\Node\FunctionLike;

class LivroBuilder
{
    protected array $data = [];
    protected ?UploadedFile $imagem = null;
    protected array $autores = [];
    protected array $generos = [];

    public function setDados(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    public function setTitulo($titulo)
    {
        $this->data['titulo'] = $titulo;
        return $this;
    }

    public function setAnoPublicacao($anoPublicacao)
    {
        $this->data['ano_publicacao'] = $anoPublicacao;
        return $this;
    }

    public function setDescricao($descricao)
    {
        $this->data['descricao'] = $descricao;
        return $this;
    }

    public function setISBN($ISBN)
    {
        $this->data['isbn'] = $ISBN;
        return $this;
    }

    public function setAutores(array $autores): static
    {
        $this->autores = $autores;
        return $this;
    }

    public function setGeneros(array $generos): static
    {
        $this->generos = $generos;
        return $this;
    }

    public function setImagem(?UploadedFile $imagem): static
    {
        $this->imagem = $imagem;
        return $this;
    }

    public function build(): Livro
    {
        if ($this->imagem) {
            $this->data['imagem'] = $this->imagem->store('capas', 'public');
        }

        $livro = Livro::create($this->data);
        $livro->autores()->attach($this->autores);
        $livro->generos()->attach($this->generos);

        return $livro;
    }
}

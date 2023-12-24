<?php

namespace Modules\Livro\Services;

use Modules\Livro\Repositories\Interfaces\LivroRepositoryInterface;
use Modules\Livro\Services\Interfaces\LivroServiceInterface;

class LivroService implements LivroServiceInterface
{

    protected $livroRepository;

    public function __construct(LivroRepositoryInterface $livroRepository)
    {
        $this->livroRepository = $livroRepository;
    }

    public function list()
    {
        return $this->livroRepository->all();
    }

    public function find($id)
    {
        return $this->livroRepository->find($id);
    }

    public function create(array $livro)
    {
        $livro['Titulo'] = $livro['Titulo'];
        $livro['Editora'] = $livro['Editora'];
        $livro['Edicao'] = $livro['Edicao'];
        $livro['AnoPublicacao'] = $livro['AnoPublicacao'];
        $livro['Valor'] = $livro['Valor'];
        return $this->livroRepository->create($livro);
    }

    public function update(array $livro)
    {
        $update = $this->find($livro['Codl']);
        $update['Titulo'] = $livro['Titulo'];
        $update['Editora'] = $livro['Editora'];
        $update['Edicao'] = $livro['Edicao'];
        $update['AnoPublicacao'] = $livro['AnoPublicacao'];
        $update['Valor'] = $livro['Valor'];
        return $this->livroRepository->update($update);
    }

    public function delete($livro)
    {
        $delete = $this->find($livro['Codl']);
        return $this->livroRepository->delete($delete);
    }
}

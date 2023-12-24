<?php

namespace Modules\Autor\Services;

use Modules\Autor\Repositories\Interfaces\AutorRepositoryInterface;
use Modules\Autor\Services\Interfaces\AutorServiceInterface;

class AutorService implements AutorServiceInterface
{

    protected $autorRepository;

    public function __construct(AutorRepositoryInterface $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    public function list()
    {
        return $this->autorRepository->all();
    }

    public function find($id)
    {
        return $this->autorRepository->find($id);
    }

    public function create(array $autor)
    {
        $autor['nome'] = $autor['nome'];
        return $this->autorRepository->create($autor);
    }

    public function update(array $autor)
    {
        $update = $this->find($autor['codau']);
        $update['nome'] = $autor['nome'];
        return $this->autorRepository->update($update);
    }

    public function delete($autor)
    {
        $delete = $this->find($autor['codau']);
        return $this->autorRepository->delete($delete);
    }
}

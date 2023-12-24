<?php

namespace Modules\Assunto\Services;

use Modules\Assunto\Repositories\Interfaces\AssuntoRepositoryInterface;
use Modules\Assunto\Services\Interfaces\AssuntoServiceInterface;

class AssuntoService implements AssuntoServiceInterface
{

    protected $assuntoRepository;

    public function __construct(AssuntoRepositoryInterface $assuntoRepository)
    {
        $this->assuntoRepository = $assuntoRepository;
    }

    public function list()
    {
        return $this->assuntoRepository->all();
    }

    public function find($id)
    {
        return $this->assuntoRepository->find($id);
    }

    public function create(array $assunto)
    {
        $assunto['descricao'] = $assunto['descricao'];
        return $this->assuntoRepository->create($assunto);
    }

    public function update(array $assunto)
    {
        $update = $this->find($assunto['codas']);
        $update['descricao'] = $assunto['descricao'];
        return $this->assuntoRepository->update($update);
    }

    public function delete($assunto)
    {
        $delete = $this->find($assunto['codas']);
        return $this->assuntoRepository->delete($delete);
    }
}

<?php

namespace Modules\Relatorio\Controllers;

use App\Http\Controllers\Controller;

use Modules\Relatorio\Services\Interfaces\RelatorioServiceInterface;
use Exception;

/**
 * @OA\Info(title="Livros", version="0.1")
 */
class RelatorioController extends Controller
{
    protected $service;

    public function __construct(RelatorioServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Listagem dos dados para WEB
     */
    public function index()
    {
        try {
            $relatorios = $this->service->list();
            return view('relatorio.listar', compact('relatorios'));
        } catch (Exception $ex) {
            report($ex);
            return response()->json(['message' => 'Falha ao efetuar a listagem Web'], 500);
        }
    }

}

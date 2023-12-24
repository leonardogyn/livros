<?php

namespace Modules\Autor\Request;

use Modules\Autor\Rule\ExcludeAutorRule;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Autor\Services\Interfaces\AutorServiceInterface;

class AutorRequest extends FormRequest
{
    protected $service;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(AutorServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        // Remove caracteres especiais dos campos, deixando somente números.
        //$this['cpf_cnpj'] = preg_replace('/[^0-9]/', '', $this['cpf_cnpj']);
    }

    /**
     * Rules
     */
    public function rules()
    {
        // Inicializa variável.
        $rules_default = array();
        $rules_update = array();
        $rules_destroy = array();

        // Regras de criação e edição
        $rules_default = [
            'nome' => [
                'required',
                'max:40',
            ],
        ];

        // create
        if ($this->route()->getActionMethod() == 'create') {
            return $rules_default;
        }
        // update
        elseif ($this->route()->getActionMethod() == 'update') {
            $rules_update = [
                'codau' => [
                    'required',
                    'unique:autor,codau,' . $this->codau . ',codau',
                    'max:36'
                ],
            ];

            return array_merge($rules_default, $rules_update);
        }
        // delete
        elseif ($this->route()->getActionMethod() == 'delete') {
            // Regras de exclusão
            $rules_destroy = [
                'codau' => new ExcludeAutorRule(),
            ];

            return $rules_destroy;
        }

        // merg.
        return array_merge($rules_default, $rules_update, $rules_destroy);
    }
    // Fim do método rules.

    /**
     * Validate
     */
    public function validated(): array
    {
        $attributes = parent::validated();
        return $attributes;
    }

    /**
     * Return the friendly field name.
     *
     * @return array
     */
    public function attributes()
    {
        $result = [
            'codau'             => 'Identificador',
            'nome'              => 'Nome'
        ];

        return $result;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'codau.required'            => 'O campo Identificador é obrigatório',
            'nome.required'             => 'O campo Nome é obrigatório',
        ];
    }
}

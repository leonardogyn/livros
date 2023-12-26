@extends('adminlte::page')

@section('title')

@section('content_header')
    @include('componentes.mensagem')

    <div class="row">
        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3 class="m-0" style="float:left"><i class="fa fa-fw fa-address-book"></i> Lista de Autores</h3>

            <a title="Adicionar" href="{{ route('cadastrarAutor') }}"  class="btn btn-primary float-right">
                <i class="fa fa-plus"></i>
                Adicionar
            </a>
        </div>
    </div>

    @push('header')

    @endpush

    @push('js')

    @endpush
@stop

@section('content')
    @if (!empty($autores) && count($autores) > 0)
        <div class="card">
            <div class="card-body">
                <table id="table" class="table table-striped">
                    <thead class="thead-light">
                        <tr class="text-secondary">
                            <th class="text-center" scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th class="text-center" scope="col">Opções</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (!empty($autores))
                            @foreach ($autores as $p)
                                <tr>
                                    <td class="text-center">{{ $p->CodAu }}</td>
                                    <td>{{ $p->Nome }}</td>

                                    <td class="text-center">
                                        <a title="Editar" href="{{ route('editarAutor', $p->CodAu) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-3 mb-3" role="alert">
            A consulta não retornou resultado.
        </div>
    @endif
@stop

@extends('adminlte::page')

@section('title')

@section('content_header')
    <h3 class="m-0"><i class="fa fa-clipboard" aria-hidden="true"></i> {{ $title_page ?? 'Cadastrar' }} </h3>

    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @endpush

    @push('js')
        <script src="{{ asset('js/manterAutor.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @endpush
@stop

@section('content')
    @include('componentes.mensagem')

    <label class="text-danger">
        <small> Campos marcados com (*) são obrigatórios.</small>
    </label>

    <form action="#" method="post" class="needs-validation" novalidate>
        <div class="row">
            <!-- AUTOR -->
            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card box-shadow">
                    <div class="card-header border-0 no-bg-color">
                        <h5 class="card-subtitle mt-1">Dados do Autor</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="CodAu" value="{{ $autor->CodAu ?? null }}" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="manter" id="manter" value="{{ $MANTER ?? 'Salvar' }}" />

                            <!-- Nome -->
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="text-input">Nome *</label>
                                <input id="Nome" name="Nome" type="text" class="form-control validarErro" value="{{ old('Nome', $autor->Nome ?? null) }}" maxlength="50" autocomplete="off" required>

                                <div class="invalid-feedback"></div>

                                <label id="Nome-error" class='text-danger' style="display: none"></label>
                            </div>
                        </div>
                    </div>
                </div>

                @include('componentes.loading')

                <div class="row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button id="{{ $MANTER ?? 'Cadastrar' }}" class="btn btn-primary float-right">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            {{ $MANTER ?? 'Cadastrar' }}
                        </button>

                        <button type="button" onclick="location.href='{{ route('indexAutor') }}'" class="btn btn-secondary mr-3 mb-5 float-left">
                            <i class="fa fa-step-backward" aria-hidden="true"></i> Voltar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@stop

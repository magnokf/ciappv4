@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                @if (session('success'))
                    <div class="col-sm-12">
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="col-sm-12">
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Register') }} Nova Solicitação - CRAF ( {{$person->fullName()}} {{$person->cpf}} )</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.applications.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">


                                <div class="col-md-6">


                                    <input id="person_id" type="hidden" class="form-control @error('person_id') is-invalid @enderror" name="person_id" value="{{ old('person_id') ?? $person->rg }}" required autocomplete="person_id" autofocus>


                                    @error('person_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sei" class="col-md-4 col-form-label text-md-right">SEI-27</label>

                                <div class="col-md-6">
                                    <input id="sei" type="text" class="form-control @error('sei') is-invalid @enderror" name="sei" value="{{ old('sei') }}" required autocomplete="sei" data-mask="0000/000000/0000" maxlength="16" autofocus>

                                    @error('sei')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">


                                <div class="col-md-6">
                                    <input id="report" type="hidden" name="report" value="0"autofocus>
{{--                                    <select id="report" type="number" class="form-control @error('report') is-invalid @enderror" name="report" required autofocus>--}}
{{--                                        <option value="0">Em Análise</option>--}}
{{--                                        <option value="1">Deferido</option>--}}
{{--                                        <option value="2">Indeferido</option>--}}
{{--                                    </select>--}}
                                </div>

                            </div>
                            @if($application->report == 1)


                            <div class="form-group row">

                                <label for="nota_def_cbmerj" class="col-md-4 col-form-label text-md-right">Nota de Deferimento/Indeferimento</label>

                                <div class="col-md-6">
                                    <input id="nota_def_cbmerj" type="text" class="form-control @error('nota_def_cbmerj') is-invalid @enderror" name="nota_def_cbmerj" value="{{ old('nota_def_cbmerj') }}" autocomplete="nota_def_cbmerj" autofocus>

                                    @error('nota_def_cbmerj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="nota_sigma_cbmerj" class="col-md-4 col-form-label text-md-right">Protocolo de Encaminhamento EB</label>

                                <div class="col-md-6">
                                    <input id="nota_sigma_cbmerj" type="text" class="form-control @error('nota_sigma_cbmerj') is-invalid @enderror" name="nota_sigma_cbmerj" value="{{ old('nota_sigma_cbmerj') }}" autocomplete="nota_sigma_cbmerj" autofocus>

                                    @error('nota_sigma_cbmerj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="nota_craf_cbmerj" class="col-md-4 col-form-label text-md-right">Nota para retirada do CRAF</label>

                                <div class="col-md-6">
                                    <input id="nota_craf_cbmerj" type="text" class="form-control @error('nota_craf_cbmerj') is-invalid @enderror" name="nota_craf_cbmerj" value="{{ old('nota_craf_cbmerj') }}" autocomplete="nota_craf_cbmerj" autofocus>

                                    @error('nota_craf_cbmerj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="craf" class="col-md-4 col-form-label text-md-right">C.R.A.F</label>

                                <div class="col-md-6">
                                    <input id="craf" type="text" class="form-control @error('craf') is-invalid @enderror" maxlength="11" name="craf" value="{{ old('craf') }}" autocomplete="craf" autofocus>

                                    @error('craf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            @endif









                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }} Solicitação
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

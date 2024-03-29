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
                    <div class="card-header">{{ __('Register') }} Novo Portador - CRAF</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.people.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="rg" class="col-md-4 col-form-label text-md-right">{{ __('RG') }}</label>

                                <div class="col-md-6">
                                    <input id="rg" type="text" maxlength="8" class="form-control @error('rg') is-invalid @enderror" name="rg" value="{{ old('rg') }}" required autocomplete="rg" autofocus>

                                    @error('rg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">Primeiro {{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Último {{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="posto" class="col-md-4 col-form-label text-md-right">Atual Posto/Graduação</label>

                                <div class="col-md-6">
                                    <select name="posto" id="posto" class="form-control-plaintext">
                                        <option value="civil" {{ (old('posto') == 'civil' ? 'selected' : '') }}>CIVIL</option>
                                        <option value="SD BM" {{ (old('posto') == 'SD BM' ? 'selected' : '') }}>SD BM</option>
                                        <option value="CB BM" {{ (old('posto') == 'CB BM' ? 'selected' : '') }}>CB BM</option>
                                        <option value="3ºSGT BM"{{ (old('posto') == '3ºSGT BM' ? 'selected' : '') }}>3ºSGT BM</option>
                                        <option value="2ºSGT BM"{{ (old('posto') == '2ºSGT BM' ? 'selected' : '') }}>2ºSGT BM</option>
                                        <option value="1ºSGT BM"{{ (old('posto') == '1ºSGT BM' ? 'selected' : '') }}>1ºSGT BM</option>
                                        <option value="SUB TEN BM"{{ (old('posto') == 'SUB TEN BM' ? 'selected' : '') }}>SUB TEN BM</option>
                                        <option value="CADETE BM"{{ (old('posto') == 'CADETE BM' ? 'selected' : '') }}>CADETE BM</option>
                                        <option value="ASPIRANTE BM" {{ (old('posto') == 'ASPIRANTE BM' ? 'selected' : '') }}>ASPIRANTE BM</option>
                                        <option value="2ºTEN BM"{{ (old('posto') == '2ºTEN BM' ? 'selected' : '') }}>2ºTEN BM</option>
                                        <option value="1ºTEN BM"{{ (old('posto') == '1ºTEN BM' ? 'selected' : '') }}>1ºTEN BM</option>
                                        <option value="CAP BM"{{ (old('posto') == 'CAP BM' ? 'selected' : '') }}>CAP BM</option>
                                        <option value="MAJOR BM"{{ (old('posto') == 'MAJOR BM' ? 'selected' : '') }}>MAJ BM</option>
                                        <option value="TEN CEL BM"{{ (old('posto') == 'TEN CEL BM' ? 'selected' : '') }}>TEN CEL BM</option>
                                        <option value="CEL BM"{{ (old('posto') == 'CEL BM' ? 'selected' : '') }}>CEL BM</option>
                                    </select>

                                    @error('posto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="cpf" class="col-md-4 col-form-label text-md-right">C.P.F</label>

                                <div class="col-md-6">
                                    <input id="cpf" type="text" class="cpf form-control @error('cpf') is-invalid @enderror" maxlength="11" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>

                                    @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Telefone de Contato</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="phone form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" maxlength="11" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>





                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }} Portador
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
@push('js')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

@endpush

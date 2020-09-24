@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('partials.errors')
                <div class="card">
                    <div class="card-header">{{ __('Register') }} Nova Solicitação - CRAF ( {{$person->fullName()}} {{$person->cpf}} )</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.applications.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="person_id" type="hidden" class="form-control @error('person_id') is-invalid @enderror" name="person_id" value="{{ old('person_id') ?? $person->rg }}" required autocomplete="person_id" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sei" class="col-md-4 col-form-label text-md-right">SEI-27</label>

                                <div class="col-md-6">
                                    <input id="sei" type="text" class="sei form-control @error('sei') is-invalid @enderror" name="sei" value="{{ old('sei') }}" required autocomplete="sei" data-mask="0000/000000/0000" maxlength="16" autofocus>

                                    @error('sei')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">


                                <div class="col-md-6">
                                    <input id="report" type="hidden" name="report" value="EM ANALISE"autofocus>
                                </div>

                            </div>
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

@push('js')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        //
    </script>
@endpush

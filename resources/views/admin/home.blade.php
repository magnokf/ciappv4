@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }} de Controle
                        @if(auth()->user()->admin == 1) -  <small style="color: red">Área do Adminstrador</small>@endif
                        @if(auth()->user()->client == 1) -  <small style="color: red">Área do Agente</small>@endif
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @include('sidebar.main')
                </div>
            </div>
        </div>
    </div>
@endsection

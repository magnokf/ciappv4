@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Painel de Controle') }} - Gestão de Agentes</div>

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
        <div class="container">
            <h2>Agentes Autorizados</h2>
            <p>Lista de agentes autorizados no sistema</p>
            <table class="table">
                <thead>
                <tr>
                    <th>RG</th>
                    <th>Nome</th>
                    <th>Último Login</th>
                    <th>IP Login</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->rg}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_login_at}}</td>
                        <td>{{$user->last_login_ip}}</td>


                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection


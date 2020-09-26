@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Painel de Controle') }} - Gestão de Usuários
                        @if(auth()->user()->admin == 1) -  <small style="color: red">Área do Adminstrador</small>@endif
                        @if(auth()->user()->client == 1) -  <small style="color: red">Área do Agente</small>@endif


                    </div>

                    <div class="card-body">
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
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                        @endif
                            @include('sidebar.main')


                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h2>Gestão do Usuário</h2>
                    @if(auth()->user()->admin == 1) - <p>Listagem de usuários cadastrados no sistema</p> @endif

                </div>
                <div class="col-md-2" style="padding: 10px">
                    @if(auth()->user()->admin == 1)<a href="{{route('admin.users.create')}}"><button class="btn btn-success">Criar Novo Usuário</button></a> @endif

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>RG</th>
                            <th>Nome</th>
                            <th>Email Verificado</th>
                            <th>Último Login</th>
                            <th>IP Login</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->rg}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email_verified_at}}</td>
                                <td>{{$user->last_login_at}}</td>
                                <td>{{$user->last_login_ip}}</td>
                                <td>

                                    <a href="{{url("admin/users/$user->id")}}"><button class="btn btn-sm btn-success">Visualizar Atividades</button></a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}"><button class="btn btn-sm btn-warning">Editar</button></a>
                                        <form action="{{ route('admin.users.destroy', $user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Deseja Excluir definitivamente?');">Delete</button>
                                        </form>

                                </td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                </div>


            </div>


        </div>
    </div>
@endsection


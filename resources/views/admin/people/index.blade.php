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
                    <h2>Lista de Portadores</h2>
                    <p>Portadores cadastrados no sistema</p>
                    @include('flash::message')
                </div>
                <div class="col-md-2" style="padding: 10px">
                    <a href="{{route('admin.people.create')}}"><button class="btn btn-sm btn-success">Criar Novo Portador</button></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 offset-4">
                    <form action="people/search" method="get">
                        {{ csrf_field() }}
                        <label for="gsearch">Buscar pelo RG:</label>
                        <input  id= "gsearch" name="search_text" type="text" />
                        <input type="submit"/>
                    </form>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($people as $person)
                            <tr>

                                <td>{{$person->fullName()}} </td>
                                <td>{{$person->rg}}</td>
                                <td>{{$person->cpf}}</td>

                                <td>


                                    <a href="{{route('admin.people.edit', $person->id)}}"><button class="btn btn-sm btn-success">Visualizar</button></a>
                                    <a href=""><button class="btn btn-sm btn-warning">Editar</button></a>
                                        <a href=""><button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Deseja Excluir definitivamente?');">Delete</button></a>


                                </td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                    {{$people->links()}}

                </div>


            </div>


        </div>
    </div>
@endsection


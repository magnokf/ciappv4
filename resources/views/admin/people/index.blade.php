@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Painel de Controle') }}
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
                @if(is_null(auth()->user()->client))

                    @else
                    <div class="col-md-2" style="padding: 10px">
                        <a href="{{route('admin.people.create')}}"><button class="btn btn-sm btn-success">Criar Novo Portador</button></a>
                    </div>
                @endif
                @if(auth()->user()->admim == 1)
                    <div class="col-md-2" style="padding: 10px">
                        <a href="{{route('admin.people.create')}}"><button class="btn btn-sm btn-success">Criar Novo Portador</button></a>
                    </div>
                @else

                @endif
            </div>

                <div class="col-md-12">

                        <a class="btn btn-sm btn-warning" href="{{route('admin.people.index')}}">Listar todos portadores</a>
                        <form action="people/search" method="get">
                            {{ csrf_field() }}
                            <div class="btn btn-sm btn-info">
                                <label for="gsearch">Filtar pelo RG:</label>
                                <input  id= "gsearch" name="search_text" type="text" type="submit"/>
                            </div>

                        </form>


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


                                    <a href="{{route('admin.people.show', ['person' =>$person->id])}}"><button class="btn btn-sm btn-success">Visualizar Atividades</button></a>
                                    <a href="{{route('admin.applications.create', ['person' => base64_encode($person->id) ])}}"><button class="btn btn-sm btn-secondary">Abrir Solicitação de CRAF</button></a>
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


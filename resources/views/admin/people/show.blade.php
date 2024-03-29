@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-12">
            @include('flash::message')
            Informações do Portador:  <strong>{{$person->first_name}}  {{$person->last_name}}</strong>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$person->rg}}</td>
                    <td>{{$person->cpf}}</td>
                    <td>{{$person->date_of_birth}}</td>
                    <td>{{$person->email}}</td>
                    <td>{{$person->phone}}</td>
                    <td>{{$person->address}}, {{$person->number}}</td>

                </tr>
                </tbody>
            </table>


        </div>
        <div class="col-md-12">

            Lista de Solicitação de CRAFs
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sol Nº</th>
                    <th>Data</th>
                    <th>Requerimento Nº SEI</th>
                    <th>Status</th>
                    <th></th>

                </tr>
                </thead>

                <tbody>
                @if($applications)
                    @foreach($applications as $application)
                <tr>
                    <td>{{$application->ident_key}} / {{$application->ident_ano}}</td>
                    <td>{{$application->created_at}}</td>
                    <td>{{$application->sei}}</td>
                    <td>{{$application->report}}</td>
                    <td><a href="{{route('admin.applications.show', $application->id)}}" class="btn btn-sm btn-dark">Visualizar</a> </td>

                </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{$applications->links()}}


        </div>

        <div class="col-md-12">

            Lista de CRAFs Modificados/Criados
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>CRAF Nº</th>
                    <th>Data</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="" class="btn btn-sm btn-dark">Visualizar</a> </td>

                </tr>
                </tbody>
            </table>

        </div>



    </div>


@endsection



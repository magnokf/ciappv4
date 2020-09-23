@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        @include('flash::message')
        Solicitante:  <strong>{{$person->first_name}} {{$person->last_name}} - CPF : {{$person->cpf}}</strong><br>
        Informações da Solicitação:  <strong>{{$application->ident_key}} / {{$application->ident_ano}}</strong><br>
        Requerimento SEI Nº:  <strong>{{$application->sei}}</strong><br>

        Status:{{$application->report}}@if($application->report == 1)<br>Nota de Deferimento: @endif
        @if($application->report == 2)
            <br>
            Nota de Indeferimento :
        @endif

    </div>
</div>

@endsection

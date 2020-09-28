@extends('layouts.app')

@section('content')
<div class="container">

    <div class="col-md-8">
        @include('flash::message')
        Solicitante:  <strong>{{$person->first_name}} {{$person->last_name}} - CPF : {{$person->cpf}} - RG : {{$person->rg}}</strong> <br>
        Protocolo CIAPP:  <strong>{{$application->ident_key}} / {{$application->ident_ano}}</strong><br>
        Requerimento SEI Nº:  <strong>SEI-27{{$application->sei}}</strong><br>

        Status: <b>{{$application->report}}</b>
                                                                                      <br>
        @if(!$application->nota_def_cbmerj)

        @else Nota de Deferimento/Indeferimento :<b>{{$application->nota_def_cbmerj}}</b><br>

        @endif
        @if(!$application->nota_sigma_cbmerj)

        @else Nota Sigma E.B :<b>{{$application->nota_sigma_cbmerj}}</b><br>

        @endif
        @if(!$application->nota_craf_cbmerj)

        @else Nota de Retirada do CRAF :<b>{{$application->nota_craf_cbmerj}}</b><br><br>

        @endif

        @if(!$application->doc1)

        @else <a href="" class="btn btn-outline-danger btn-sm btn-warning"><b>Nota Fiscal :</b><b>Arquivo</b><br></a>


        @endif

        @if(!$application->doc2)

        @else <a href="" class="btn btn-outline-danger btn-sm btn-warning"><b>GRU :</b><b>Arquivo</b><br></a>


        @endif

        @if(!$application->doc3)

        @else <a href="" class="btn btn-outline-danger btn-sm btn-warning"><b>Anexo C :</b><b>Arquivo</b><br></a>


        @endif


        @if(!$application->craf)

        @else <a href="" class="btn btn-outline-danger btn-sm btn-warning"><b>Registro CRAF :</b><b>{{$application->craf}}</b><br></a>


        @endif
    </div>





</div>


@endsection

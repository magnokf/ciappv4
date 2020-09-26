@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">


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
                    <div class="card-header">{{ __('Register') }} a Atualização da Solicitação Nº{{$application->ident_key}}/{{$application->ident_ano}} - CRAF ( {{$person->fullName()}} {{$person->cpf}} )</div>
                        @if($application->report == 'EM ANALISE')<b class="btn btn-outline-primary" style="color:  blue">{{$application->report}}</b>@endif
                        @if($application->report == 'DEFERIDO')<b class="btn btn-outline-success" style="color:  forestgreen">{{$application->report}}</b>@endif
                        @if($application->report == 'INDEFERIDO')<b class="btn btn-outline-danger" style="color:  red">{{$application->report}}</b>@endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.applications.update', [$application->id]) }}" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{$application->id}}">
                            @method('PUT')
                            @csrf
                            @include('flash::message')
                            <div class="form-group row">
                                <input type="hidden" name="sei" value="{{$application->sei}}">
                                <label for="report" class="col-md-4 col-form-label text-md-right">Atualizar a Situação da Análise do Documento:</label>

                                <div class="form-group form-check-inline col-md-6" >
                                    <input type="radio" style="margin: 5px" name="report" class="form-check-input" value="EM ANALISE"{{ $application->report == 'EM ANALISE' ? 'checked' : '' }}><b style="color: blue">EM ANALISE</b>
                                    <input type="radio" style="margin: 5px" name="report" class="form-check-input" value="DEFERIDO"{{$application->report == 'DEFERIDO' ? 'checked' : '' }}><b style="color: green">DEFERIDO</b>
                                    <input type="radio" style="margin: 5px" name="report" class="form-check-input" value="INDEFERIDO"{{$application->report == 'INDEFERIDO' ? 'checked' : ''}}><b style="color: red">INDEFERIDO</b>
                                </div>
                            </div>
                            @if($application->report == 'INDEFERIDO')

                            @else
                                <div class="form-group row">

                                    <label for="nota_def_cbmerj" class="col-md-4 col-form-label text-md-right">Nota de Deferimento/Indeferimento</label>

                                    <div class="col-md-6">
                                        <input id="nota_def_cbmerj" type="text" class="form-control @error('nota_def_cbmerj') is-invalid @enderror" name="nota_def_cbmerj" value="{{ old('nota_def_cbmerj') ?? $application->nota_def_cbmerj }}" autocomplete="nota_def_cbmerj" autofocus>

                                        @error('nota_def_cbmerj')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="nota_sigma_cbmerj" class="col-md-4 col-form-label text-md-right">Protocolo de Encaminhamento EB</label>

                                    <div class="col-md-6">
                                        <input id="nota_sigma_cbmerj" type="text" class="form-control @error('nota_sigma_cbmerj') is-invalid @enderror" name="nota_sigma_cbmerj" value="{{ old('nota_sigma_cbmerj') ?? $application->nota_sigma_cbmerj }}" autocomplete="nota_sigma_cbmerj" autofocus>

                                        @error('nota_sigma_cbmerj')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="nota_craf_cbmerj" class="col-md-4 col-form-label text-md-right">Nota para retirada do CRAF</label>

                                    <div class="col-md-6">
                                        <input id="nota_craf_cbmerj" type="text" class="form-control @error('nota_craf_cbmerj') is-invalid @enderror" name="nota_craf_cbmerj" value="{{ old('nota_craf_cbmerj') ?? $application->nota_craf_cbmerj  }}" autocomplete="nota_craf_cbmerj" autofocus>

                                        @error('nota_craf_cbmerj')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="craf" class="col-md-4 col-form-label text-md-right">C.R.A.F</label>

                                    <div class="col-md-6">
                                        <input id="craf" type="text" class="form-control @error('craf') is-invalid @enderror" maxlength="11" name="craf" value="{{ old('craf') ?? $application->craf }}" autocomplete="craf" autofocus>

                                        @error('craf')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="nf" class="col-md-4 col-form-label text-md-right">Nota Fiscal</label>
                                    <div class="col-md-6">

                                        <input type="file" name="nf" class="form-control-file @error('nf') is-invalid @enderror">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="gru" class="col-md-4 col-form-label text-md-right">G.R.U</label>
                                    <div class="col-md-6">

                                        <input type="file" name="gru" class="form-control-file @error('gru') is-invalid @enderror">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="anexo_c" class="col-md-4 col-form-label text-md-right">Anexo C</label>
                                    <div class="col-md-6">

                                        <input type="file" name="anexo_c" class="form-control-file @error('anexo_c') is-invalid @enderror">
                                    </div>

                                </div>



                                <div>
                                    <img src="{{ url('imagem/') . $application->doc1  }}" alt="">
                                    <img src="{{ url('imagem/') . $application->doc2  }}" alt="">
                                    <img src="{{ url('imagem/') . $application->doc3  }}" alt="">
                                </div>

                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-danger">
                                        Atualizar Solicitação {{$application->ident_key}}/{{$application->ident_ano}}
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




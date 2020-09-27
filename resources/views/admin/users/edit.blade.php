@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-5">Atualizar Usuário</h1>

           @include('alerts.messages')

            <form method="post" action="{{ route('admin.users.update', ['user' => $user->id]) }}">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="form-group">

                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}" @if($user->admin != 1) readonly @endif />
                </div>
                <div class="form-group">

                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" name="cpf" value="{{ old('cpf') ?? $user->cpf }}" @if($user->admin != 1) readonly @endif />
                </div>


                <div class="form-group">
                    <label for="email">Email:</label>
                    @if($user->email_verified_at) <b style="color: blue">VERIFICADO</b>
                    @else<b style="color: red">NÃO FOI VERIFICADO</b>
                    @endif
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') ?? $user->email }}" />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rg">RG:</label>
                    <input type="text" class="form-control" name="rg" value="{{old('rg') ?? $user->rg }}" readonly />
                </div>
                @if(auth()->user()->admin == 1)  <small style="color: red">Área do Adminstrador</small>
            <p>Situação atual no crafApp:</p>

                <div class="form-group">
                    <label for="admin">Admin:
                    @if($user->admin == 1) <b style="color: blue">ATIVADO</b>
                    @elseif($user->admin != 1) <b style="color: red">DESATIVADO</b>
                    @endif
                    </label>
                    <input type="hidden" class="form-control" name="admin" value={{old('admin') ?? $user->admin }} />
                    <select class="browser-default custom-select" name="admin" id="admin">
                        <option value={{old('admin') ?? $user->admin }} selected>SELECIONE</option>
                        <option value="1"><b style="color: blue">ADM AUTORIZADO</b> </option>
                        <option value="0"><b style="color: red">DESATIVADO</b></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="client">Agente:
                    @if($user->client == 1) <b style="color: blue">AGENTE AUTORIZADO</b>
                    @elseif($user->client != 1) <b style="color: red">AGENTE NÃO AUTORIZADO</b>
                    @endif
                    </label>
                    <input type="hidden" class="form-control" name="client" value={{old('client') ?? $user->client }} />
                    <select class="browser-default custom-select" name="client" id="client">
                        <option value={{old('client') ?? $user->client }}>SELECIONE</option>
                        <option value="1">AGENTE AUTORIZADO</option>
                        <option value="0">AGENTE NÃO AUTORIZADO</option>
                    </select>
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Atualizar dados</button>
                <a href="{{route('admin.users.index')}}" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </div>
@endsection


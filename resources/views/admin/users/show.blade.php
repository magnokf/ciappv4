@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-12">
            Atividades do Usuário:<strong>{{$user->name}}</strong>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Ação</th>
                        <th>IP Registrado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{$user->last_login_ip}}</td>
                    </tr>
                    </tbody>
                </table>


            </div>
        <div class="col-md-12">

            Lista de CRAFs Modificados/Criados
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>CRAF Nº</th>
                    <th>Data</th>
                    <th>Ação</th>
                    <th>Campos Modificados</th>
                    <th>IP Registrado</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$user->last_login_ip}}</td>
                </tr>
                </tbody>
            </table>

        </div>

        <div class="col-md-12">

            Lista de Portadores Modificados/Criados
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Portador ID</th>
                    <th>Data</th>
                    <th>Ação</th>
                    <th>IP Registrado</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$user->last_login_ip}}</td>
                </tr>
                </tbody>
            </table>

        </div>

        </div>
    </div>

@endsection


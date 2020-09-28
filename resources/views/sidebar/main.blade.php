<div class="sidebar">
    <div class="col-md-12">
        <button class="btn btn-group-sm">
            <a href="{{route('admin.users.index')}}"><button class="btn btn-primary">Gestão do Usuário</button></a>
            @if(auth()->user()->admin == 1)
                <a href="{{route('admin.users.team')}}"><button class="btn btn-success">Agentes</button></a>
            @endif


            <a class="btn btn-secondary" href="{{route('admin.applications.index')}}">Solicitações</a>
            <button class="btn btn-primary">CRAF</button>
            @if(auth()->user()->admin == 1 | auth()->user()->client == 1)
                <a href="{{route('admin.people.index')}}"><button class="btn btn-warning">Portadores</button></a>
            @endif


        </button>
    </div>
</div>

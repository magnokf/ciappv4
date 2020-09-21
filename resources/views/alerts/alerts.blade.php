@if(session()->has('flash-success'))
    <div class="alert alert-success">
        <ul>
            <li>{{session()->get('flash-success')}}</li>
        </ul>
    </div>
@endisset

@isset($success)
    <div class="alert alert-success">
        <ul>
            <li>{{$success}}</li>
        </ul>
    </div>
@endisset

@isset($aviso)
    <div class="alert alert-info">
        <ul>
            <li>{{$aviso}}</li>
        </ul>
    </div>
@endisset

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <small>{{ $error }}</small>
            @endforeach
        </ul>
    </div>
@endif

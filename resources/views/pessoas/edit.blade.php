@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editar Cadastro</h1>
 
        @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        <br /> 
        @endif
        <form method="post" action="{{ route('pessoas.update', $pessoas->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
 
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" name="nome" value="{{ $pessoas->nome }}" />
            </div>
 
            <div class="form-group">
                <label for="idade">Idade: *</label>
                <input type="text" class="form-control" name="idade" value="{{ $pessoas->idade }}" />
            </div>

            <div class="form-group">
          
                <label for="sexo">Sexo: *</label>

                <select name= "sexo" class="custom-select">
                    @foreach(App\Enums\SexoEnum::values() as $key=>$value)
                    <option $value=={{$pessoas->sexo}} ? 'selected':'' >{{$value}}</option>                    
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="email">Email: *</label>
                <input type="text" class="form-control" name="email" value="{{ $pessoas->email }}" />
            </div>

            <div class="form-group">
                <label for="cargo">Cargo: *</label>
                <input type="text" class="form-control" name="cargo" value="{{ $pessoas->cargo }}" />
            </div>

            <div class="form-group">
                <label for="telefone">Telefone: *</label>
                <input type="text" class="form-control" name="telefone" value="{{ $pessoas->telefone }}" />
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</div>
@endsection
@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Visualizar Cadastro</h1>

        <br /> 
        
        <form action="{{ route('pessoas.show', $pessoas->id) }}">
           
            <div class="form-group">
 
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" name="nome" value="{{ $pessoas->nome }}" readonly/>
            </div>
 
            <div class="form-group">
                <label for="idade">Idade: *</label>
                <input type="text" class="form-control" name="idade" value="{{ $pessoas->idade }}" readonly/>
            </div>

            <div class="form-group">
                <label for="sexo">Sexo: *</label>
                <input type="text" class="form-control" name="sexo" value="{{ $pessoas->sexo }}" readonly/>
            </div>

            <div class="form-group">
                <label for="email">Email: *</label>
                <input type="text" class="form-control" name="email" value="{{ $pessoas->email }}" readonly/>
            </div>

            <div class="form-group">
                <label for="cargo">Cargo: *</label>
                <input type="text" class="form-control" name="cargo" value="{{ $pessoas->cargo }}" readonly/>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone: *</label>
                <input type="text" class="form-control" name="telefone" value="{{ $pessoas->telefone }}" readonly/>
            </div>

            <div class="form-group">
                <label for="status">Status: *</label>
                <input type="text" class="form-control" name="status" value="{{ $pessoas->status }}" readonly/>
            </div>

            <a href="{{ route('pessoas.index')}}" class="btn btn-primary">
                Voltar
            </a>
        </form>
    </div>
</div>
@endsection
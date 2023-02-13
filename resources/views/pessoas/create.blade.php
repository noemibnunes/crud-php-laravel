@extends('base')
 
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Adicionar Pessoa</h1>
  <div>
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
      </div><br />
    @endif
      <form method="post" action="{{ route('pessoas.store') }}">
          @csrf
          <div class="form-group">    
              <label for="nome">Nome: *</label>
              <input type="text" class="form-control" name="nome" placeholder="Nome do funcionário(a)"/>
          </div>
 
          <div class="form-group">
              <label for="idade">Idade: *</label>
              <input type="text" class="form-control" name="idade" placeholder="Idade"/>
          </div>
 
          <div class="form-group">
          
          <label for="sexo">Sexo: *</label>

          <select name="sexo" class="custom-select">
            <option selected>Selecione</option>
            @foreach(App\Enums\SexoEnum::values() as $key=>$value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
          </select>

          </div>

          <div class="form-group">    
              <label for="email">Email: *</label>
              <input type="text" class="form-control" name="email" placeholder="nome@email.com"/>
          </div>

          <div class="form-group">    
              <label for="cargo">Cargo: *</label>
              <input type="text" class="form-control" name="cargo" placeholder="Cargo"/>
          </div>
          
          <div class="form-group">
              <label for="telefone">Telefone: *</label>
              <input type="text" class="form-control" name="telefone" placeholder="Telefone"/>
          </div>

          <button type="submit" class="btn btn-primary">Adicionar</button>
      </form>
  </div>
</div>
</div>
@endsection
@extends('base')
 
@section('main')
<div class="row">
<div class="col-sm-12">
    <h3 class="display-4" style="text-align:center;">Funcionários</h3>
    <div>
    <a href="{{ route('pessoas.create')}}" class="btn btn-outline-success mb-3">Novo</a>
    </div>     
    @if(session()->get('success'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nome</td>
          <td>Idade</td>
          <td>Sexo</td>
          <td>Email</td>
          <td>Cargo</td>
          <td>Telefone</td>
          <td>Status</td>
          <td>Última atualização</td>
          <td colspan = 2 style="text-align:center;">Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pessoas as $pessoa)
        <tr>
            <td>{{$pessoa->id}}</td>
            <td>{{$pessoa->nome}} </td>
            <td>{{$pessoa->idade}}</td>
            <td>{{$pessoa->sexo->value}}</td>
            <td>{{$pessoa->email}}</td>
            <td>{{$pessoa->cargo}}</td>
            <td>{{$pessoa->telefone}}</td>
            <td>{{$pessoa->status->value}}</td>
            <td>{{$pessoa->updated_at}}</td>

            <td>
                <a href="{{ route('pessoas.show',$pessoa->id)}}" class="btn btn-success">
                  <span class="glyphicon glyphicon-eye-open"></span>
                </a>
            </td>

            <td>
              @if($pessoa->status->value == App\Enums\StatusEnum::Inativo->value)
                <button type="button" class="btn btn-primary" disabled>
                  <span class="glyphicon glyphicon-pencil"></span>
                </button>
              @else
                <a href="{{ route('pessoas.edit',$pessoa->id)}}" class="btn btn-primary">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
               @endif
            </td>

            <td>
              @if($pessoa->status->value == App\Enums\StatusEnum::Ativo->value)
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#{{$pessoa->id}}">
                <span class="glyphicon glyphicon-ban-circle"></span>
              </button>

              @else
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#{{$pessoa->id}}">
                <span class="glyphicon glyphicon-ok"></span>
              </button>
              @endif

              <div class="modal fade" id="{{$pessoa->id}}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="statusModalLabel" style="font-weight: bold;">Alterar Status</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @if($pessoa->status->value == App\Enums\StatusEnum::Ativo->value)
                    <div class="modal-body">
                      Deseja inativar o(a) funcionário(a) {{$pessoa->nome}}?
                    </div>
                    @else
                    <div class="modal-body">
                      Deseja ativar o(a) funcionário(a) {{$pessoa->nome}}?
                    </div>
                    @endif 
                    <div class="modal-footer">
                        <form action="{{ route('generated::u4MXnYwkQOn1vXuo', $pessoa->id)}}" method="post">
                          @csrf
                          @method('PUT')
                          <button class="btn btn-info" type="submit">
                            Confirmar
                          </button>
                        </form>
                      <button type="button" class="btn btn-primary"  data-dismiss="modal" aria-label="Close">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>

            <td>

              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$pessoa->id}}">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>

                <div class="modal fade" id="delete-{{$pessoa->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel" style="font-weight: bold;">Deletar Funcionário(a)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Deseja excluir o(a) funcionário(a) {{$pessoa->nome}}? 
                      </div>
                      <div class="modal-footer">
                        <form action="{{ route('pessoas.destroy', $pessoa->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">
                            Confirmar
                          </button>
                        </form>

                        <button type="button" class="btn btn-primary"  data-dismiss="modal" aria-label="Close">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
                
            </td>

            
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
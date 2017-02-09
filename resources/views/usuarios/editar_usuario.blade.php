@extends('layouts.app')

@section('content')
	<h1 class="text-center">Editar Usuário</h1>
	<hr>
	<form class="form-horizontal" role="form" method="POST" action="{{ url("usuarios/update/$usuario->id") }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group{{ $errors->has('matricula') ? ' has-error' : '' }}">
            <label for="matricula" class="col-md-4 control-label">Matrícula</label>

            <div class="col-md-6">
                <input id="matricula" type="text" class="form-control" name="matricula" value="{{ $usuario->matricula }}" required autofocus>

                @if ($errors->has('matricula'))
                    <span class="help-block">
                        <strong>{{ $errors->first('matricula') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
            <label for="usuario" class="col-md-4 control-label">Usuário</label>

            <div class="col-md-6">
                <input id="usuario" type="text" class="form-control" name="usuario" value="{{ $usuario->usuario }}" required autofocus>

                @if ($errors->has('usuario'))
                    <span class="help-block">
                        <strong>{{ $errors->first('usuario') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
            <label for="nome" class="col-md-4 control-label">Nome</label>

            <div class="col-md-6">
                <input id="nome" type="text" class="form-control" name="nome" value="{{ $usuario->nome }}" required autofocus>

                @if ($errors->has('nome'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('nivel_acesso') ? ' has-error' : '' }}">
            <label for="nivel_acesso" class="col-md-4 control-label">Nível de Acesso</label>

            <div class="col-md-6">
                <select name="nivel_acesso" id="nivel_acesso" class="form-control" required>
                	<option value="">Selecione</option>
                    @foreach($niveis_acesso as $nivel)                                    
                        <option value="{{ $nivel->id }}">{{ $nivel->nivel_acesso }}</option>
                    @endforeach
                </select>

                @if ($errors->has('nivel_acesso'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nivel_acesso') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <a class="btn btn-default" href="{{ url('usuarios') }}">Voltar</a>
                <button type="submit" class="btn btn-primary">
                    Atualizar
                </button>
            </div>
        </div>
    </form>
@endsection
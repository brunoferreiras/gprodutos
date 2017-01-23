@extends('templates.login-template')

@section('content')
	<form class="form-horizontal" role="form" method="POST" action="{{ route('usuarios.store') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('matricula') ? ' has-error' : '' }}">
            <label for="matricula" class="col-md-4 control-label">Matrícula</label>

            <div class="col-md-6">
                <input id="matricula" type="text" class="form-control" name="matricula" value="{{ old('matricula') }}" required autofocus>

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
                <input id="usuario" type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" required autofocus>

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
                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" required autofocus>

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
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                    <option value="1">Usuário</option>
                    <option value="2">Gestor</option>
                    <option value="3">Administrador</option>
                </select>

                @if ($errors->has('nivel_acesso'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nivel_acesso') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
            <label for="senha" class="col-md-4 control-label">Senha</label>

            <div class="col-md-6">
                <input id="senha" type="password" class="form-control" name="senha" required>

                @if ($errors->has('senha'))
                    <span class="help-block">
                        <strong>{{ $errors->first('senha') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="senha-confirm" class="col-md-4 control-label">Confirmar Senha</label>

            <div class="col-md-6">
                <input id="senha-confirm" type="password" class="form-control" name="senha_confirmation" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Registrar
                </button>
            </div>
        </div>
    </form>
@endsection
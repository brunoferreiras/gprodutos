@extends('layouts.app')

@section('content')
	<h1 class="text-center">Usuário: {{ $usuario->nome }}</h1>
	<hr>
	<div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Matrícula:</strong>
                {{ $usuario->matricula }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Usuário:</strong>
                {{ $usuario->usuario }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $usuario->nome }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $usuario->email }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nível de Acesso:</strong>
                {{ $usuario->niveis_acesso_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <a class="btn btn-default" href="{{ url('usuarios') }}">Voltar</a>
            </div>
        </div>
    </div>    
@endsection
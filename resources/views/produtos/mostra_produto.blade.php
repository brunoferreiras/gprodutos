@extends('templates.menu-template')

@section('content')
	<h1 class="text-center">Produto: {{ $produto->produto }}</h1>
	<hr>
	<div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tag RFID:</strong>
                {{ $produto->tag_rfid }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Código de Barras:</strong>
                {{ $produto->cod_barras }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descricao:</strong>
                {{ $produto->descricao }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantidade:</strong>
                {{ $produto->quantidade }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quem cadastrou:</strong>
                {{ $produto->users_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('produtos.index') }}">Voltar</a>
            </div>
        </div>
    </div>    
@endsection
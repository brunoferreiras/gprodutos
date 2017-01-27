@extends('layouts.app')

@section('content')
	<h1 class="text-center">Registrar Empréstimo</h1>
	<hr>
	<form class="form-horizontal" role="form" method="POST" action="{{ url('emprestimo') }}">
		{{ csrf_field() }}

		<div class="form-group {{ $errors->has('responsavel') ? ' has-error' : ''}}">
			<label for="responsavel" class="col-md-4 control-label">Responsável pela retirada</label>

			<div class="col-md-6">
				<input type="text" id="responsavel" class="form-control" name="responsavel" value="{{ Auth::user()->nome }}" disabled required autofocus>

				@if ( $errors->has('responsavel') )
					<span class="help-block">
						<strong>{{ $errors->first('responsavel') }}</strong>
					</span>
				@endif
			</div>			
		</div>

		{{-- <div class="form-group {{ $errors->has('tag_rfid') ? ' has-error' : ''}}">
			<label for="tag_rfid" class="col-md-4 control-label">Tag RFID</label>

			<div class="col-md-6">
				<input type="text" id="tag_rfid" class="form-control" name="tag_rfid" value="{{ old('tag_rfid') }}" required autofocus>

				@if ( $errors->has('tag_rfid') )
					<span class="help-block">
						<strong>{{ $errors->first('tag_rfid') }}</strong>
					</span>
				@endif
			</div>			
		</div>

		<div class="form-group {{ $errors->has('cod_barras') ? ' has-error' : ''}}">
			<label for="cod_barras" class="col-md-4 control-label">Código de Barras</label>
			<div class="col-md-6">
				<input type="text" id="cod_barras" class="form-control" name="cod_barras" value="{{ old('cod_barras') }}" required autofocus>
			</div>

			@if( $errors->has('cod_barras') )
				<span class="help-block">
					<strong>{{ $errors->first('cod_barras') }}</strong>
				</span>
			@endif			
		</div> --}}

		<div class="form-group {{ $errors->has('produto') ? ' has-error' : ''}}">
			<label for="produto" class="col-md-4 control-label">Produto</label>

			<div class="col-md-6">
				<select class="form-control" name="produto" id="produto">
					<option value="">Selecione</option>
					@forelse( $produtos as $produto)
						<option value="{{ $produto->id }}">{{ $produto->produto }}</option>
					@empty
						<option value="">Não foi encontrado nenhum produto cadastrado!</option>
					@endforelse
				</select>

				@if ( $errors->has('produto') )
					<span class="help-block">
						<strong>{{ $errors->first('produto') }}</strong>
					</span>
				@endif
			</div>			
		</div>

		<div class="form-group {{ $errors->has('quantidade') ? ' has-error' : ''}}">
			<label for="quantidade" class="col-md-4 control-label">Quantidade</label>

			<div class="col-md-6">
				<input type="text" id="quantidade" class="form-control" name="quantidade" value="{{ old('quantidade') }}" required autofocus>

				@if ( $errors->has('quantidade') )
					<span class="help-block">
						<strong>{{ $errors->first('quantidade') }}</strong>
					</span>
				@endif
			</div>			
		</div>

		<div class="form-group">
            <div class="col-md-6 col-md-offset-4">
            	<a class="btn btn-default" href="{{ route('produtos.index') }}">Voltar</a>
                <button type="submit" class="btn btn-primary">
                    Registrar Empréstimo
                </button>
            </div>
        </div>
	</form>
@endsection

@section('scripts')

@endsection
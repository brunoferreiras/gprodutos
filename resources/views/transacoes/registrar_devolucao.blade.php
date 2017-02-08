@extends('layouts.app')

@section('content')
    <h1 class="text-center">Registrar Devolução</h1>
    
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Responsável</th>
            <th>Data de Empréstimo</th>
            <th>Hora de Empréstimo</th>
            <th>Quantidade para devolver</th>
            <th>Ações</th>            
        </thead>
        <tbody>
            @forelse($registro_saidas as $saida)
                <tr>
                    <td>{{ $saida->produto_nome }}</td>
                    <td>{{ $saida->quantidade_saida }}</td>
                    <td>{{ $saida->users_id }}</td>
                    <td>{{ date('d/m/Y', strtotime($saida->horas_saida)) }}</td>
                    <td>{{ date('H:i:s', strtotime($saida->horas_saida)) }}</td>
                    <td>
                    	<form method="POST" action="{{ url("devolucao") }}">
                    		{{ csrf_field() }}
							<input type="hidden" name="produto" value="{{ $saida->produtos_id }}">
                    		<input type="number" name="quantidade_devolucao" class="form-control" min="1" max="{{ $saida->quantidade_saida }}" required>                     		                  		
					</td>
					<td>
						<button type="submit" class="btn btn-success" >Devolver</button>
					</td>
                    	</form>               
                    

                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">Nenhuma devolução realizada!</td>
                </tr>
            @endforelse
        </tbody>        
    </table>

@endsection
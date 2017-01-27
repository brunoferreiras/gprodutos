@extends('layouts.app')

@section('content')
    <h1 class="text-center">Relatório de Empréstimos</h1>
    
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Responsável</th>
            <th>Data do Empréstimo</th>
            <th>Hora do Empréstimo</th>           
        </thead>
        <tbody>
            @forelse($emprestimos as $emprestimo)
                <tr>
                    <td>{{ $emprestimo->produtos_id }}</td>
                    <td>{{ $emprestimo->quantidade_saida }}</td>
                    <td>{{ $emprestimo->users_id }}</td>
                    <td>{{ date('d/m/Y', strtotime($emprestimo->horas_saida)) }}</td>
                    <td>{{ date('H:i:s', strtotime($emprestimo->horas_saida)) }}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">Nenhum empréstimo realizado!</td>
                </tr>
            @endforelse
        </tbody>        
    </table>
    
    <hr>

    <h1 class="text-center">Relatório de Devoluções</h1>
    
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Responsável</th>
            <th>Data da Devolução</th>
            <th>Hora da Devolução</th>           
        </thead>
        <tbody>
            @forelse($devolucoes as $devolucoes)
                <tr>
                    <td>{{ $devolucoes->produtos_id }}</td>
                    <td>{{ $devolucoes->quantidade_entrada }}</td>
                    <td>{{ $devolucoes->users_id }}</td>
                    <td>{{ date('d/m/Y', strtotime($devolucoes->horas_entrada)) }}</td>
                    <td>{{ date('H:i:s', strtotime($devolucoes->horas_entrada)) }}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">Nenhuma devolução realizada!</td>
                </tr>
            @endforelse
        </tbody>        
    </table>

@endsection
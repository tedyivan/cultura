@extends('categoria.categoria-layout')

@section('content')
	<style>
			.formulario{
				padding: 30px;
			}
	</style>
	
	<div class="container">
			<div class="formulario">

				<h3>Tabela de Produtos</h3>
				
				<table class="table table-striped table-bordered">
					@foreach($produtos as $produto)

					    <tr>
					    
					        <th><strong>Nome</strong></th>
					    	<th><strong>Preco</strong></th>
					    	<th><strong>Descricao</strong></th>
					    </tr>           

					    <tr>
					    
					        <td>{!! $produto->nome!!}</td>
					        <td>{!! $produto->preco !!}</td>
					        <td>{!! $produto->descricao !!}</td>
						</tr>
					@endforeach
				
			</table>



			</div>
	</div>

@endsection
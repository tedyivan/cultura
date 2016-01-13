@extends('categoria.categoria-layout')

@section('content')
	<style>
			.formulario{
				margin-top: 30px;
			}
			.btn-lateral{
				text-align: right;
				margin-top: 40px;
			}
			
	</style>
	
	<div class="container">
			<div class="row formulario">

				
				<div class="col-md-10">
					<h3>Tabela de Produtos</h3>
				
						<table class="table table-striped table-bordered">
							

							    <tr>
							    
							        <th><strong>Nome</strong></th>
							    	<th><strong>Preco</strong></th>
							    	<th><strong>Descricao</strong></th>
							    	<th><strong>Categoria</strong></th>
							    </tr>           

							@foreach($produtos as $produto)
							    <tr>
							    
							        <td><a href="/produto/{{ $produto->id }}">{!! $produto->nome!!}</a></td>
							        <td>{!! $produto->preco !!}</td>
							        <td>{!! $produto->descricao !!}</td>

							        @foreach($categorias as $categoria)
							        		@if($categoria->id == $produto->categoria_id)
							        			<td>{!! $categoria->designacao !!}</td>
							        		@endif
							        @endforeach
							        
							        
							        <td><a href="/produto/{{ $produto->id }}/edit">editar<span></span></a></td>
									
								</tr>
							@endforeach
						
					</table>
			</div>
			<div class="col-md-2 btn-lateral">
				<a class="btn btn-primary" href="{{ url('/produto/create') }}">adicionar <span class="glyphicon glyphicon-plus"></span></a>
			</div>


			</div>
	</div>

@endsection
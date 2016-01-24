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
			<div class="col-md-1">
				
			</div>	
			<div class="col-md-9">
						<h3>Tabela de Categorias</h3>
					
							<table class="table table-striped table-bordered">
								

								    <tr>
								    
								        <th><strong>Designacao</strong></th>
								    	<th><strong>Descricao</strong></th>
								    </tr>           

								@foreach($categorias as $categoria)
								    <tr>
								    
								        <td><a href="/categoria/{{ $categoria->id }}">{!! $categoria->designacao!!}</a></td>
								        <td>{!! $categoria->descricao !!}</td>
								        <td>
								        	<a href="/categoria/{{ $categoria->id }}/edit">editar<span></span></a>
								        	

								        </td>

										
									</tr>
								@endforeach
							
						</table>
				</div>
				<div class="col-md-2">
				
				</div>
		</div>	
	</div>
@endsection
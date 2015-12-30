@extends('categoria.categoria-layout')

@section('content')
	<style >
			.conteudo{
				padding: 40px;
			}
			
			.baixos{
				padding: 10px;
				background: gray;
				margin-top:30px;
			}
			.btn-baixos{
				margin-top: 30px;
				margin-left: 100px;
				text-align: center;
			}
	</style>
	<section id="abaut">
		<div class="row conteudo">
		<div class="col-md-3"></div>
		

		<div class="col-md-4">
			<div class="row">
				<img src="{{ asset($image->file) }}" height="300px" />	
			</div>	

			<div class="row baixos">
				<img src="{{ asset($image->file) }}" height="150px" />
				<img src="{{ asset($image->file) }}" height="150px" />
				<img src="{{ asset($image->file) }}" height="150px" />
				<img src="{{ asset($image->file) }}" height="150px" />
			</div>
				
		</div>		
		
		<div class="col-md-3">
				<div class="form-group">
					<label>Nome : </label>
					{!! $produto->nome !!}
				</div>

				<div class="form-group">
					<label>Preco: </label>
					{!! $produto->preco !!} mt
				</div>

				<div class="form-group">
					<label>Descricao: </label>
					{!! $produto->descricao !!}
				</div>
		</div>
		
		</div>
		
		<div class="row btn-baixos">
			
			<a href="{{ url('/produto/') }}" class="btn btn-primary" role="button">
               Voltar
               <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
		</div>
		
	</section>


@endsection
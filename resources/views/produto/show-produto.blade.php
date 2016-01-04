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
			.imgcima{
				max-height: 300px;
				display: block;
			    margin-left: auto;
			    margin-right: auto;
			}
			.btn-add-img{
				margin-top: 10px;
			}
	</style>
	<!-- A parte do modal para fazer upload-->
	<div class="modal fade" id="upload" tabindex="-1" aria-hidden="true" role="dialog">
		<div class="modal-dialog modal-lg">		
			<div class="modal-content">	
				<div class="modal-header">
					<h2>Adicionando imagem</h2>
				</div>
				
				<div class="modal-body">
					<label class="titulo">Upload image</label>
						{!! Form::open(['url'=>'/image', 'method'=>'POST', 'files'=>'true']) !!}
							<div class="form-group">
							
							<h4>Designacao</h4>		
								{!!Form::text('nome',null,['class'=>'form-control']) !!}
							<input id="produto_id" name="produto_id" class="form-control">
							</div>
				
							<div class="form-group">
		         				<label for="userfile">Image File</label>
		         				<input type="file" class="form-control" name="userfile">
		      				</div>
		      	</div>			
		      	<div class="modal-footer">
		      				<div class="form-group buttons-abaixo">
							<button type="submit" class="btn btn-primary">Registar</button>
						    <a href="{{ url('/produto') }}" class="btn btn-warning">Cancel</a>
						    </div>
				</div>

				{!! Form::close() !!}
		
			</div>	
		</div>
		
	</div>




	<section id="abaut">
		<div class="row conteudo">
		<div class="col-md-3"></div>
		

		<div class="col-md-4">
			
			<div class="row">
				<div class="imgcima">
				<img src="{{ asset($images->first()->file) }}" height="300px" id="cima"/> 
				</div>
			</div>	

			<div class="row baixos">
			@foreach($images as $image)
			
				<img src="{{ asset($image->file) }}" height="150px" width="150px" id="imgClickAndChange" onclick="changeImage('{{ asset($image->file) }}')" />
				
			@endforeach
			</div>
			<div class="row btn-add-img">
				<a class="btn uppic btn-primary" role="button" data-toggle="modal" href="#upload" data-id="{!! $produto->id !!}">
               Imagem <span class="glyphicon glyphicon-plus"></span>
            	</a>	
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

																			
	</div>


	
@endsection



@extends('categoria.categoria-layout')

@section('content')
	<style >
			.conteudo{
				padding: 40px;
			}
			
			.baixos{
				padding: 10px;
				background: #e1e1e1;
				margin-top:30px;
				text-align: center;
			}
			.btn-baixos{
				margin-top: 30px;
				margin-left: 100px;
				text-align: center;
			}
			.imgcima img{
				max-height: 400px;
				max-width: 600px;
				display: block;
			    margin-left: auto;
			    margin-right: auto;
			}
			.btn-add-img{
				margin-top: 10px;
			}

			.baixos-icon img{

			}

			.baixos-icon{
				position: relative;
				overflow: hidden;
			}
			.baixos-overlay{
				position: absolute;
				background: rgba(0,0,0,.5);
				width: 100%;
				height: 100%;
				
			}

			.baixos-icon:hover .baixos-overlay{
				top:0;
			} 

			.lupa{
				font-size: 50px;
				color: #fff;
				text-align: center;
				
			    
			}

			.cima{
				text-align: center;
			}

			.dadosproduto {
				margin-left: 70px;
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
							<input id="produto_id" name="produto_id" class="form-control" type="hidden">
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
			
			<div class="row cima">
				<div class="imgcima">
				<img src="{{ asset($images->first()->file) }}" height="400px" width="500px" id="cima"/> 
				</div>
			</div>	

			<div class="row baixos">
			@foreach($images as $image)
			 	<div class="col-md-4">
					<div class="baixos-icon">
						<img src="{{ asset($image->file) }}" height="150px" width="150px" id="imgClickAndChange" onclick="changeImage('{{ asset($image->file) }}')" />
						<div class="baixos-overlay">
							<i type="hidden" onclick="changeImage('{{ asset($image->file) }}')" class="lupa glyphicon glyphicon-zoom-in"></i>
						</div>
						

					</div>
				</div>

			@endforeach
			</div>
			<div class="row btn-add-img">
				<a class="btn uppic btn-primary" role="button" data-toggle="modal" href="#upload" data-id="{!! $produto->id !!}">
               Imagem <span class="glyphicon glyphicon-plus"></span>
            	</a>	
			</div>
				
		</div>		
		
		<div class="dadosproduto col-md-3">
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

				<div class="form-group">
					<label>Categoria:</label>
					{!!$categoria_produto->designacao!!}
				</div>
		</div>
		
		</div>
		
		<div class="row btn-baixos">
			
			<a href="{{ url('/produto/') }}" class="btn btn-primary" role="button">
               Voltar
               <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
		</div>
		
	</section>

																			
	</div>


	
@endsection



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
			.cada-icon{
				display: block;

				margin-right: 15px;
				margin-bottom: 15px;
			}
			.lupa,.dvpreco{
				text-align: center;
			}
			.thumbnail img { min-height:300px; height:300px; } 
			.cadaproduto { 
				margin-top: 15px;
				margin-bottom: 50px;}
			.dvnome{
				text-align: left;
			}
	</style>
	
	
	<div class="container">
				<div class="row formulario">
					
					<div class="col-md-11">
					<h3>Produtos</h3>
						<div class="row baixos">
							@foreach($produtos_imgs as $produto_img)
							 	<div class="col-md-4 cadaproduto">
									<div class="dvnome">
										<h4>{{ $produto_img->nome }}</h4>
									</div>
									<div class="thumbnail">
										<img src="{{ asset($produto_img->file) }}" height="300px" width="300px" id="imgClickAndChange" onclick="changeImage('{{ asset($produto_img->file) }}')" />
										<div class="cada-overlay">
											<!--<i type="hidden" onclick="changeImage('{{ asset($produto_img->file) }}')" class="lupa glyphicon glyphicon-zoom-in"></i>
											-->
										</div>
										

									</div>
									<div class="dvpreco">
										<h4>Preço: {{ $produto_img->preco }} mt</h4>
									</div>
								</div>
							@endforeach
						</div>
								
					</div>
					<div class="col-md-1 btn-lateral">
						<a class="btn btn-primary" href="{{ url('/produto/create') }}">adicionar <span class="glyphicon glyphicon-plus"></span></a>
					</div>



				</div>
	</div>












@endsection
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

			.carousel-control.left, .carousel-control.right {
				   background-image:none;
				   filter:none;
			}

			.carousel img {
			  position: absolute;
			  top: 0;
			  left: 0;
			  min-width: 90%;
			  max-width: 90%;
			  height: 500px;
			}


	</style>
	
	
	<div class="container">
				
				<div class="row formulario hidden-xs">
					
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
					<div class="col-md-1 btn-lateral ">
						<a class="btn btn-primary" href="{{ url('/produto/create') }}">adicionar <span class="glyphicon glyphicon-plus"></span></a>
					</div>



				</div>

				<div class="row formulario hidden-lg">
				<div class="hidden-lg">
							
							<div id="carouselProduto" class="carousel slide" data-ride="carousel" data-interval="false" >
								  <!-- Indicators -->
								  <!--
								  <ol class="carousel-indicators">
								    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								    <li data-target="#myCarousel" data-slide-to="1"></li>
								    <li data-target="#myCarousel" data-slide-to="2"></li>
								    <li data-target="#myCarousel" data-slide-to="3"></li>
								  </ol>
									-->
								  <!-- Wrapper for slides -->
								  <div class="carousel-inner" role="listbox">
								    
									@foreach($produtos_imgs as $count=>$produto_img)
            								
											@if($count == 0)
												<div class="item active">

										           <img src="{{ asset($produto_img->file) }}" id="imgClickAndChange" onclick="changeImage('{{ asset($produto_img->file) }}')" />
									      		
									      		</div>
										    
										    @else
										    
										    <div class="item">
										    	   <img src="{{ asset($produto_img->file) }}" id="imgClickAndChange" onclick="changeImage('{{ asset($produto_img->file) }}')" />
										    </div>
										    
										    @endif

										  <div class="hidden">
										   {{++$count }}
										   </div>
									
									@endforeach










								  </div>

								  <!-- Left and right controls -->
								  <a class="left carousel-control" href="#carouselProduto" role="button" data-slide="prev">
								    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								    <span class="sr-only">Previous</span>
								  </a>
								  <a class="right carousel-control" href="#carouselProduto" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
								  </a>
							</div>



						</div>
					</div>


	</div>












@endsection
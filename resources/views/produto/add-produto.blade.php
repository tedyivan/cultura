@extends('categoria.categoria-layout')

@section('content')
	<style>
			.formulario{
				padding: 30px;
			}
			.buttons-abaixo{
				text-align: center;
				margin-top: 30px;
			}
			.titulo{
				margin-top: 20px;
				margin-bottom: 30px;
				font:24px normal Oxygen;
			}
	</style>
	
	<div class="container">
			
			<div class="formulario">
			<label class="titulo">Registo de produto</label>
				{!! Form::open(['url'=>'/produto', 'method'=>'POST', 'files'=>'true']) !!}
					<div class="form-group">
					
					<h4>Designacao</h4>		
						{!!Form::text('nome',null,['class'=>'form-control']) !!}
					
					</div>

					<h4>Preco</h4>
					<div class="form-group">
						
						{!!Form::text('preco',null,['class'=>'form-control']) !!}
					
					</div>

					<h4>Descricao</h4>
					<div class="form-group">
						
						{!!Form::textarea('descricao',null,['class'=>'form-control']) !!}
					
					</div>

					<div class="form-group">
					
					<select name="categoria_id">
  							@foreach ($categorias as $categoria) {
    							<option value="1" >{{ $categoria->designacao }}</option>
  							}
  							@endforeach
					</select>
					
					<!--
					@foreach($categorias as $categoria)
						<h2>{{ $categoria->designacao}}

					@endforeach
					-->

					</div>
					<div class="form-group">
         				<label for="userfile">Image File</label>
         				<input type="file" class="form-control" name="userfile">
      				</div>
      				
      				<div class="form-group buttons-abaixo">
					<button type="submit" class="btn btn-primary">Registar</button>
				    <a href="{{ url('/produto') }}" class="btn btn-warning">Cancel</a>
				    </div>


				{!! Form::close() !!}
			</div>
	</div>

@endsection
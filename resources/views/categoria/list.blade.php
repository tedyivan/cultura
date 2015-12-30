@extends('categoria.categoria-layout')

@section('content')

	  @foreach($categorias as $categoria)
			<h2>{{ $categoria->designacao}}

	@endforeach

@endsection
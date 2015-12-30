
@extends('master')

@section('content')
		
    <section id="slider">
      <div class="slider-overlay">
      <div class="container">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
             <div class="item active">
               <h1>Pagina <span> Teste </span></h1>
               <h2>Testando</h2>
             </div>
            
            <div class="item">
              <img class="imgSlider" src="/images/sofa.jpg">
            </div>
            
          </div>

          
        </div>

      </div>
      </div>
    </section>
    
@endsection

@extends('layouts.app')
@section('content')
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/salud1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="text-white">Especialistas en prótesis dental</h1>
                <p class="text-white">Tratamiento dental de calidad realizado por un experto</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/salud2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="text-white">Nos ocupamos de tus dientes</h1>
                <p class="text-white">Piensa en ti regálate una sonrisa</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/salud3.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="text-white">Ortodoncia</h1>
                <p class="text-white">La mejor solución para tener unos dientes bellos y saludables</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Carousel -->
    <div id="carouselExampleAutoplaying" class="carousel slide rounded" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/teste.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/teste2.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/teste3.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/teste4.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/teste5.gif" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Fim do Carousel -->
    
    @auth
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="alert alert-success text-center" id="welcomeMessage" role="alert">
                Seja bem-vindo(a), {{ Auth::user()->name }}!
            </div>
        </div>
    </div>
    @endauth

    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Bem-vindo ao nosso Pet Shop!</h1>
            <p>Encontre os melhores produtos e serviços para o seu animal de estimação.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card h-100" style="max-width: 300px;">
                <img src="images/racão.png" class="card-img-top img-fluid" alt="Comida para Cães" style="max-height: 200px;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Comida para Cães</h5>
                    <p class="card-text">Variedade de alimentos saudáveis para o seu cão.</p>
                    <a href="#" class="btn btn-primary mt-auto">Ver Produtos</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100" style="max-width: 300px;">
                <img src="images/racão.png" class="card-img-top img-fluid" alt="Acessórios para Cães" style="max-height: 200px;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Acessórios para Cães</h5>
                    <p class="card-text">Brinquedos, coleiras e mais para o seu cachorro.</p>
                    <a href="#" class="btn btn-primary mt-auto">Ver Itens</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100" style="max-width: 300px;">
                <img src="images/racão.png" class="card-img-top img-fluid" alt="Pequenos animais de estimação" style="max-height: 200px;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Pequenos Animais</h5>
                    <p class="card-text">Nossos serviços para pequenos animais.</p>
                    <a href="#" class="btn btn-primary mt-auto">Ver Serviços</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100" style="max-width: 300px;">
                <img src="images/racão.png" class="card-img-top img-fluid" alt="Outro Card" style="max-height: 200px;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Outro Card</h5>
                    <p class="card-text">Este é um card adicional para preencher o espaço.</p>
                    <a href="#" class="btn btn-primary mt-auto">Ver Mais</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        var welcomeMessage = document.getElementById('welcomeMessage');
        if (welcomeMessage) {
            welcomeMessage.style.display = 'none';
        }
    }, 5000); // Tempo em milissegundos
</script>
@endsection
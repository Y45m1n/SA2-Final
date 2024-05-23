<?php
include 'functions.php';
?>
<?= template_header ('Loca aqui!')?>

<div class="content text-center">
    <h2 style="color: #F1A204;">Se o assunto for economia de tempo, a solução mais prática, confortável e acessível para você e sua família é Aqui!</h2>
    <p>Na Loca Aqui!, cada aluguel é uma jornada de liberdade e conveniência. Com uma variedade de veículos, atendimento personalizado e conforto garantido, proporcionamos uma experiência perfeita em cada viagem. 
       </p>
    
       <div id="carouselExample" class="carousel slide" style="width: 100%;height: 300px; margin: 0;">
    <div class="carousel-inner" style="width:100%; height: 600px;"> <!-- Altura mantida em 600px -->
        <div class="carousel-item active">
            <img src="img/img1.webp" class="d-block w-100" style="width: 100%; height: 350px; object-fit: cover;" alt="...">
        </div>
        <div class="carousel-item"> 
            <img src="img/card2.jpg" class="d-block w-100" style="width: 100%; height: 350px; object-fit: cover;" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/img3.webp" class="d-block w-100" style="width: 100%; height: 350px; object-fit: cover;" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
<div class="content text-center">
    <h2  style="color: #F1A204;">Veículos em destaque</h2>
    
    <div class="row mt-5">
        <!-- Cards superiores -->
        <div class="col-md-4 mb-4" >
            <div class="card" style="align-items:center;">
                <img src="img/fiatmobi.jpg" class="card-img-top" alt="Imagem do Card 1"  style="width:300px; height: 200px; ">
                <div class="card-body">
                    <h5 class="card-title">Fiat Mobi</h5>
                    <p class="card-text">
                    É um veículo compacto e eficiente, perfeito para deslocamentos urbanos. <br>
                    Com um design moderno e economia de combustível, oferece conforto e agilidade em cada viagem. <br>
                     Experimente a praticidade e versatilidade do Fiat Mobi.
</p>
                    <a href="create.php" class="btn btn-primary">Realizar Reserva</a> 
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card" style="align-items:center;">
                <img src="img/corolla.webp" class="card-img-top" alt="Imagem do Card 1" style="width:250px; height: 222px;">
                <div class="card-body">
                    <h5 class="card-title">Corolla</h5>
                    <p class="card-text">
                    O Toyota Corolla é um sedã renomado, reconhecido por sua confiabilidade, conforto e tecnologia. <br>
                     Com um design elegante e espaçoso, oferece uma experiência de condução suave e refinada. <br>
                
            
                  </p>
                    <a href="create.php" class="btn btn-primary">Realizar Reserva</a> 
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card" style="align-items:center;">
                <img src="img/minivan.webp" class="card-img-top" alt="Imagem do Card 3" style="width:300px; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">Fiat Minivan</h5>
                    <p class="card-text">

                    A minivan é a escolha ideal para famílias que buscam espaço e conforto em suas viagens. <br>
                     Com grande capacidade de pessoas e bagagens, oferece versatilidade e praticidade. 
                     Experimente o amplo espaço interior e o conforto da minivan.
</p>
<a href="create.php" class="btn btn-primary">Realizar Reserva</a> 
                </div>
            </div>
        </div>
    </div>


<?= template_footer()?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
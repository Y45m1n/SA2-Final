<?php
include 'functions.php';
?>
<?= template_header ('SENAI')?>

<div class="container">
    <div class="content text-center">
        <div class="row mt-5">
            <!-- Cards superiores -->
            <div class="col-md-4 mb-4">
                <div class="card" style="align-items:center;">
                    <img src="img/card1.png" class="card-img-top" alt="Imagem do Card 1" style="width:300px; height: 200px; ">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Item</h5>
                        <p class="card-text">Cadastro de Item para Estoque de Materiais.</p>
                        <a href="estoque/cadastro_estoque.php" class="btn btn-primary">Cadastrar</a> 
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" style="align-items:center;">
                    <img src="img/card2.png" class="card-img-top" alt="Imagem do Card 2" style="width:300px; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Patrimônio</h5>
                        <p class="card-text">Cadastro de Ativos Patrimoniais.</p>
                        <br>
                        <a href="cad_patrimonios.php" class="btn btn-primary">Cadastrar</a> 
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" style="align-items:center;">
                    <img src="img/funcionariocard.png" class="card-img-top" alt="Imagem do Card 3" style="width:300px; height: 200px;">
                    <div class="card-body">
                    <h5 class="card-title">Cadastro de Funcionário</h5>
                    <p class="card-text">Cadastro de Funcionarios da escola.</p>
                        <br>
                        <a href="createFuncionario.php" class="btn btn-primary">Cadastrar</a> 
                       
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card" style="align-items:center;">
                <img src="img/card3e4.jpg" class="card-img-top" alt="Imagem do Card 6" style="width:200px; height: 200px;">
                  
                    <div class="card-body">
                    <h5 class="card-title">Listar Materais</h5>
                        <p class="card-text">Lista de materiais no da escola.</p>
                        <br>
                        <a href="estoque/listar_material.php" class="btn btn-primary">Listar</a> 
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" style="align-items:center;">
                <img src="img/card3e4.jpg" class="card-img-top" alt="Imagem do Card 4" style="width:200px; height: 200px;">
                   
                    <div class="card-body">
                    <h5 class="card-title">Listar Ativos Patrimoniais</h5>
                        <p class="card-text">Lista de Ativos Patrimoniais da escola.</p>
                       
                        <br>
                        <a href="listar_produtos.php" class="btn btn-primary">Listar</a> 
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card" style="align-items:center;">
                <img src="img/listafun.png" class="card-img-top" alt="Imagem do Card 5" style="width:300px; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">Listar Funcionário</h5>
                        <p class="card-text">Lista de funcionarios da escola.</p>
                        <br>
                        <a href="listarFuncionario.php" class="btn btn-primary">Listar</a> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-4 mb-4">
                <div class="card" style="align-items:center;">
                <img src="img/listafun.png" class="card-img-top" alt="Imagem do Card 5" style="width:300px; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">Listar Funcionário</h5>
                        <p class="card-text">Lista de funcionarios da escola.</p>
                        <br>
                        <a href="listarFuncionario.php" class="btn btn-primary">Listar</a> 
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" style="align-items:center;">
                <img src="img/listafun.png" class="card-img-top" alt="Imagem do Card 5" style="width:300px; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">Listar Funcionário</h5>
                        <p class="card-text">Lista de funcionarios da escola.</p>
                        <br>
                        <a href="listarFuncionario.php" class="btn btn-primary">Listar</a> 
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" style="align-items:center;">
                <img src="img/listafun.png" class="card-img-top" alt="Imagem do Card 5" style="width:300px; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">Listar Funcionário</h5>
                        <p class="card-text">Lista de funcionarios da escola.</p>
                        <br>
                        <a href="listarFuncionario.php" class="btn btn-primary">Listar</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<style>
    .card {
    height: 380px; /* Defina a altura desejada para todos os cards */
}

</style>


<?= template_footer()?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

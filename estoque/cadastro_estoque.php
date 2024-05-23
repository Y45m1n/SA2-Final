<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Materiais</title>
    <link rel="stylesheet" href="estoque.css">
</head>
<body>
<div class="container">
        <h1>Cadastro de Materiais</h1>
        <form action="processa_formulario.php" method="post">
            <div class="form-row">
                <div class="form-column">
                    <label for="nome_material">Nome do Material</label>
                    <input type="text" id="nome_do_material" name="nome_material" required>
                </div>
                <div class="form-row">
                <div class="form-column">
                    <label for="id_material">Id do Material</label>
                    <input type="text" id="id_material" name="id_material" required>
                </div>
                <div class="form-column">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" id="quantidade" name="quantidade">
                </div>
                <div class="form-column">
                    <label for="categoria">Categoria</label>
                    <input type="text" id="categoria" name="categoria" required>
                </div>
                <div class="form-column">
                    <label for="data_entrada">Data de Entrada</label>
                    <input type="date" id="data_entrada" name="data_entrada" required>
                </div>
                <div class="form-column">
                    <label for="tipo_movimentação">Tipo de Movimentação</label>
                    <input type="text" id="tipo_movimentação" name="tipo_movimentação" required>
                </div>
                <div class="form-column">
                    <label for="data_movimentação">Data de Movimentação</label>
                    <input type="date" id="data_movimentação" name="data_movimentação" required>
                </div>
</body>
</html>
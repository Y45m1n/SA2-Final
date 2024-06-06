<?php
$host = 'localhost';
$port = '5432';
$dbname = 'db_patrimonio';
$user = 'postgres';
$password = 'postgres';

// Conexão com o banco de dados
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . pg_last_error());
}

if (isset($_GET['id_material'])) {
    $id_material = $_GET['id_material'];

    // Query para selecionar o produto específico
    $query = "SELECT * FROM nome_material WHERE id_material = '$id_material'";
    $result = pg_query($conn, $query);

    if (!$result) {
        die("Erro na consulta ao banco de dados: " . pg_last_error());
    }

    $produto = pg_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nome_material = $_POST['nome_material'];
    $id_material = $_POST['id_material'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];
    $data_entrada = $_POST['data_entrada'];
    $tipo_movimentacao = $_POST['tipo_movimentacao'];
    $data_movimentacao= $_POST['data_movimentacao'];

    // Query para atualizar os dados na tabela
    $query = "
    UPDATE patrimonio_produtos SET
        nome_materiaL = '$nome_material',
        id_material = '$id_material',
        quantidade = '$quantidade',
        categoria = '$categoria',
        data_entrada = '$data_entrada',
        tipo_movimentacao = '$tipo_movimentacao',
        data_movimentacao= '$data_movimentacao',
    WHERE numero_patrimonio = '$numero_patrimonio';
    ";

    $result = pg_query($conn, $query);

    if (!$result) {
        echo "Erro na atualização dos dados: " . pg_last_error();
    } else {
        // Redireciona para a página de listagem após atualização bem-sucedida
        header("Location: /patrimonios/listar_produtos.php");
        exit;
    }
}

// Fecha a conexão
pg_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="estoque.css">
</head>
<body>
    <div class="container">
        <h1>Editar Produto</h1>
        <form action="editar_estoque.php" method="post">
            <input type="hidden" name="id_material" value="<?php echo $produto['id_material']; ?>">
            <label for="nome_material">Nome do Material:</label>

            <input type="text" id="nome_material" name="nome_material" value="<?php echo $produto['nome_material']; ?>" required>
            <label for="id_material">ID Do Material</label>

            <input type="number" id="nome_material" name="nome_material" value="<?php echo $produto['nome_material']; ?>" required>
            <label for="quantidade">Quantidade</label>

            <textarea id="id_material" name="nome_material"><?php echo $produto['id_material']; ?></textarea>
            <label for="categoria">Categoria</label>

            <input type="date" id="data_entrada" name="data_entrada" value="<?php echo $produto['data_entrada']; ?>" required>
            <label for="data_entrada">Data de Entrada</label>

            <input type="text" id="tipo_movimentacao" name="tipo_movimentacao" value="<?php echo $produto['tipo_movimentacao']; ?>">
            <label for="tipo_movimentacao">Tipo de Movimentação</label>

            <input type="text" id="data_movimentacao" name="data_movimentacao value="<?php echo $produto['data_movimentacao']; ?>">
            <label for="data_movimentacao">Data de movimentação:</label>
            
            <input type="text" id="fabricante" name="fabricante" value="<?php echo $produto['fabricante']; ?>">
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>

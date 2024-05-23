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

if (isset($_GET['numero_patrimonio'])) {
    $numero_patrimonio = $_GET['numero_patrimonio'];

    // Query para selecionar o produto específico
    $query = "SELECT * FROM patrimonio_produtos WHERE numero_patrimonio = '$numero_patrimonio'";
    $result = pg_query($conn, $query);

    if (!$result) {
        die("Erro na consulta ao banco de dados: " . pg_last_error());
    }

    $produto = pg_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $numero_patrimonio = $_POST['numero_patrimonio'];
    $nome_produto = $_POST['nome_produto'];
    $descricao_produto = $_POST['descricao_produto'];
    $data_aquisicao = $_POST['data_aquisicao'];
    $fornecedor = $_POST['fornecedor'];
    $custo_aquisicao = $_POST['custo_aquisicao'];
    $localizacao = $_POST['localizacao'];
    $responsavel = $_POST['responsavel'];
    $valor_original = $_POST['valor_original'];
    $vida_util_estimada = $_POST['vida_util_estimada'];
    $status_atual = $_POST['status_atual'];
    $data_ultima_manutencao = $_POST['data_ultima_manutencao'];
    $proxima_manutencao_programada = $_POST['proxima_manutencao_programada'];
    $fabricante = $_POST['fabricante'];

    // Query para atualizar os dados na tabela
    $query = "
    UPDATE patrimonio_produtos SET
        nome_produto = '$nome_produto',
        descricao_produto = '$descricao_produto',
        data_aquisicao = '$data_aquisicao',
        fornecedor = '$fornecedor',
        custo_aquisicao = '$custo_aquisicao',
        localizacao = '$localizacao',
        responsavel = '$responsavel',
        valor_original = '$valor_original',
        vida_util_estimada = '$vida_util_estimada',
        status_atual = '$status_atual',
        data_ultima_manutencao = '$data_ultima_manutencao',
        proxima_manutencao_programada = '$proxima_manutencao_programada',
        fabricante = '$fabricante'
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
    <link rel="stylesheet" href="patrimonios.css">
</head>
<body>
    <div class="container">
        <h1>Editar Produto</h1>
        <form action="editar_produto.php" method="post">
            <input type="hidden" name="numero_patrimonio" value="<?php echo $produto['numero_patrimonio']; ?>">
            <label for="nome_produto">Nome do Produto:</label>
            <input type="text" id="nome_produto" name="nome_produto" value="<?php echo $produto['nome_produto']; ?>" required>
            <label for="descricao_produto">Descrição do Produto:</label>
            <textarea id="descricao_produto" name="descricao_produto"><?php echo $produto['descricao_produto']; ?></textarea>
            <label for="data_aquisicao">Data de Aquisição:</label>
            <input type="date" id="data_aquisicao" name="data_aquisicao" value="<?php echo $produto['data_aquisicao']; ?>" required>
            <label for="fornecedor">Fornecedor:</label>
            <input type="text" id="fornecedor" name="fornecedor" value="<?php echo $produto['fornecedor']; ?>">
            <label for="custo_aquisicao">Custo de Aquisição:</label>
            <input type="number" step="0.01" id="custo_aquisicao" name="custo_aquisicao" value="<?php echo $produto['custo_aquisicao']; ?>">
            <label for="localizacao">Localização:</label>
            <input type="text" id="localizacao" name="localizacao" value="<?php echo $produto['localizacao']; ?>">
            <label for="responsavel">Responsável:</label>
            <input type="text" id="responsavel" name="responsavel" value="<?php echo $produto['responsavel']; ?>">
            <label for="valor_original">Valor Original:</label>
            <input type="number" step="0.01" id="valor_original" name="valor_original" value="<?php echo $produto['valor_original']; ?>">
            <label for="vida_util_estimada">Vida Útil Estimada (anos):</label>
            <input type="number" id="vida_util_estimada" name="vida_util_estimada" value="<?php echo $produto['vida_util_estimada']; ?>">
            <label for="status_atual">Status Atual:</label>
            <input type="text" id="status_atual" name="status_atual" value="<?php echo $produto['status_atual']; ?>">
            <label for="data_ultima_manutencao">Data da Última Manutenção:</label>
            <input type="date" id="data_ultima_manutencao" name="data_ultima_manutencao" value="<?php echo $produto['data_ultima_manutencao']; ?>">
            <label for="proxima_manutencao_programada">Próxima Manutenção Programada:</label>
            <input type="date" id="proxima_manutencao_programada" name="proxima_manutencao_programada" value="<?php echo $produto['proxima_manutencao_programada']; ?>">
            <label for="fabricante">Fabricante:</label>
            <input type="text" id="fabricante" name="fabricante" value="<?php echo $produto['fabricante']; ?>">
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>

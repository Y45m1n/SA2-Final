<?php
$host = 'localhost'; // Endereço do servidor PostgreSQL
$port = '5432';      // Porta padrão do PostgreSQL
$dbname = 'db_patrimonio'; // Nome do banco de dados
$user = 'postgres';         // Nome do usuário
$password = 'postgres';      // Senha do usuário
// Conexão com o banco de dados
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");


if (!$conn) {
    die("Erro na conexão com o banco de dados: " . pg_last_error());
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

    // Query para inserir os dados na tabela
    $query = "
    INSERT INTO patrimonio_produtos (
        numero_patrimonio,
        nome_produto,
        descricao_produto,
        data_aquisicao,
        fornecedor,
        custo_aquisicao,
        localizacao,
        responsavel,
        valor_original,
        vida_util_estimada,
        status_atual,
        data_ultima_manutencao,
        proxima_manutencao_programada,
        fabricante
    ) VALUES (
        '$numero_patrimonio',
        '$nome_produto',
        '$descricao_produto',
        '$data_aquisicao',
        '$fornecedor',
        '$custo_aquisicao',
        '$localizacao',
        '$responsavel',
        '$valor_original',
        '$vida_util_estimada',
        '$status_atual',
        '$data_ultima_manutencao',
        '$proxima_manutencao_programada',
        '$fabricante'
    );
    ";

    $result = pg_query($conn, $query);

    if (!$result) {
        echo "Erro na inserção dos dados: " . pg_last_error();
    } else {
        // Redireciona para a página de listagem após inserção bem-sucedida
        header("Location: listar_produtos.php");
        exit;
    }
}

// Fecha a conexão
pg_close($conn);
?>

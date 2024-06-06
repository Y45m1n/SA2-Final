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

    // Query para apagar o produto específico
    $query = "DELETE FROM patrimonio_produtos WHERE numero_patrimonio = '$numero_patrimonio'";
    $result = pg_query($conn, $query);

    if (!$result) {
        die("Erro na exclusão do produto: " . pg_last_error());
    } else {
        // Redireciona para a página de listagem após exclusão bem-sucedida
        header("Location: /patrimonios/listar_produtos.php");
        exit;
    }
}

// Fecha a conexão
pg_close($conn);
?>

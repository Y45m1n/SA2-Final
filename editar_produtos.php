<?php
$host = 'localhost';
$port = '5432';
$dbname = 'db_patrimonio';
$user = 'postgres';
$password = 'postgres';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . pg_last_error());
}

if (isset($_GET['numero_patrimonio'])) {
    $numero_patrimonio = $_GET['numero_patrimonio'];
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        
        $update_query = "UPDATE patrimonio_produtos SET 
            nome_produto='$nome_produto', 
            descricao_produto='$descricao_produto', 
            data_aquisicao='$data_aquisicao', 
            fornecedor='$fornecedor', 
            custo_aquisicao='$custo_aquisicao', 
            localizacao='$localizacao', 
            responsavel='$responsavel', 
            valor_original='$valor_original', 
            vida_util_estimada='$vida_util_estimada', 
            status_atual='$status_atual', 
            data_ultima_manutencao='$data_ultima_manutencao', 
            proxima_manutencao_programada='$proxima_manutencao_programada', 
            fabricante='$fabricante' 
            WHERE numero_patrimonio='$numero_patrimonio'";
        
        $update_result = pg_query($conn, $update_query);
        
        if ($update_result) {
            echo "Produto atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o produto: " . pg_last_error($conn);
        }
    }

    $query = "SELECT * FROM patrimonio_produtos WHERE numero_patrimonio='$numero_patrimonio'";
    $result = pg_query($conn, $query);
    
    if ($result) {
        $produto = pg_fetch_assoc($result);
    } else {
        die("Erro na consulta ao banco de dados: " . pg_last_error());
    }
} else {
    die("Número de patrimônio não fornecido.");
}
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
        <form action="editar_produto.php?numero_patrimonio=<?php echo $numero_patrimonio; ?>" method="post">
            <div class="form-row">
                <div class="form-column">
                    <label for="nome_produto">Nome do Produto:</label>
                    <input type="text" id="nome_produto" name="nome_produto" value="<?php echo $produto['nome_produto']; ?>" required>
                </div>
                <div class="form-column">
                    <label for="descricao_produto">Descrição do Produto:</label>
                    <textarea id="descricao_produto" name="descricao_produto"><?php echo $produto['descricao_produto']; ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="data_aquisicao">Data de Aquisição:</label>
                    <input type="date" id="data_aquisicao" name="data_aquisicao" value="<?php echo $produto['data_aquisicao']; ?>" required>
                </div>
                <div class="form-column">
                    <label for="fornecedor">Fornecedor:</label>
                    <input type="text" id="fornecedor" name="fornecedor" value="<?php echo $produto['fornecedor']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="custo_aquisicao">Custo de Aquisição:</label>
                    <input type="number" step="0.01" id="custo_aquisicao" name="custo_aquisicao" value="<?php echo $produto['custo_aquisicao']; ?>">
                </div>
                <div class="form-column">
                    <label for="localizacao">Localização:</label>
                    <input type="text" id="localizacao" name="localizacao" value="<?php echo $produto['localizacao']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="responsavel">Responsável:</label>
                    <input type="text" id="responsavel" name="responsavel" value="<?php echo $produto['responsavel']; ?>">
                </div>
                <div class="form-column">
                    <label for="valor_original">Valor Original:</label>
                    <input type="number" step="0.01" id="valor_original" name="valor_original" value="<?php echo $produto['valor_original']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="vida_util_estimada">Vida Útil Estimada (anos):</label>
                    <input type="number" id="vida_util_estimada" name="vida_util_estimada" value="<?php echo $produto['vida_util_estimada']; ?>">
                </div>
                <div class="form-column">
                    <label for="status_atual">Status Atual:</label>
                    <select id="status_atual" name="status_atual">
                        <option value="novo" <?php echo $produto['status_atual'] == 'novo' ? 'selected' : ''; ?>>Novo</option>
                        <option value="usado" <?php echo $produto['status_atual'] == 'usado' ? 'selected' : ''; ?>>Usado</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="data_ultima_manutencao">Data da Última Manutenção:</label>
                    <input type="date" id="data_ultima_manutencao" name="data_ultima_manutencao" value="<?php echo $produto['data_ultima_manutencao']; ?>">
                </div>
                <div class="form-column">
                    <label for="proxima_manutencao_programada">Próxima Manutenção Programada:</label>
                    <input type="date" id="proxima_manutencao_programada" name="proxima_manutencao_programada" value="<?php echo $produto['proxima_manutencao_programada']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="fabricante">Fabricante:</label>
                    <input type="text" id="fabricante" name="fabricante" value="<?php echo $produto['fabricante']; ?>">
                </div>
            </div>
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>

<?php
pg_close($conn);
?>

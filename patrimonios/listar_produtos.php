<?php
$host = 'localhost'; // Endereço do servidor PostgreSQL
$port = '5432';      // Porta padrão do PostgreSQL
$dbname = 'db_patrimonio'; // Nome do banco de dados
$user = 'postgres';         // Nome do usuário
$password = 'postgres';       // Senha do usuário

// Conexão com o banco de dados
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . pg_last_error());
}

// Query para selecionar todos os produtos
$query = "SELECT * FROM patrimonio_produtos";
$result = pg_query($conn, $query);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . pg_last_error());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="patrimonios.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Produtos</h1>
        <table>
            <thead>
                <tr>
                    <th>Número de Patrimônio</th>
                    <th>Nome do Produto</th>
                    <th>Descrição</th>
                    <th>Data de Aquisição</th>
                    <th>Fornecedor</th>
                    <th>Custo</th>
                    <th>Localização</th>
                    <th>Responsável</th>
                    <th>Valor Original</th>
                    <th>Vida Útil Estimada</th>
                    <th>Status</th>
                    <th>Última Manutenção</th>
                    <th>Próxima Manutenção</th>
                    <th>Fabricante</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($produto = pg_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $produto['numero_patrimonio']; ?></td>
                    <td><?php echo $produto['nome_produto']; ?></td>
                    <td><?php echo $produto['descricao_produto']; ?></td>
                    <td><?php echo $produto['data_aquisicao']; ?></td>
                    <td><?php echo $produto['fornecedor']; ?></td>
                    <td><?php echo $produto['custo_aquisicao']; ?></td>
                    <td><?php echo $produto['localizacao']; ?></td>
                    <td><?php echo $produto['responsavel']; ?></td>
                    <td><?php echo $produto['valor_original']; ?></td>
                    <td><?php echo $produto['vida_util_estimada']; ?></td>
                    <td><?php echo $produto['status_atual']; ?></td>
                    <td><?php echo $produto['data_ultima_manutencao']; ?></td>
                    <td><?php echo $produto['proxima_manutencao_programada']; ?></td>
                    <td><?php echo $produto['fabricante']; ?></td>
                    <td>
                        <a href="/patrimonios/editar_produto.php?numero_patrimonio=<?php echo $produto['numero_patrimonio']; ?>">Editar</a> | 
                        <a href="/patrimonios/apagar_produto.php?numero_patrimonio=<?php echo $produto['numero_patrimonio']; ?>" onclick="return confirm('Tem certeza que deseja apagar este produto?');">Apagar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Fecha a conexão
pg_close($conn);
?>

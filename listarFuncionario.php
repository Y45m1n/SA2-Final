<?php
include 'functions.php';
// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 10;

// Preparar a instrução SQL e obter registros da tabela funcionario, LIMIT irá determinar a página
$stmt = $pdo->prepare('SELECT * FROM funcionario ORDER BY id_funcionario OFFSET :offset LIMIT :limit');
$stmt->bindValue(':offset', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Buscar os registros para exibi-los em nosso modelo.
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obter o número total de funcionários, isso é para determinar se deve haver um botão de próxima e anterior
$num_employees = $pdo->query('SELECT COUNT(*) FROM funcionario')->fetchColumn();
?>


<?=template_header('Visualizar funcionários')?>
<link rel="stylesheet" href="index.css">


<div class="content read">
    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>Endereço</td>
                <td>Email</td>
                <td>Celular</td>
                <td>CPF</td>
                <td>RA</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?=$employee['nome']?></td>
                <td><?=$employee['endereco']?></td>
                <td><?=$employee['email']?></td>
                <td><?=$employee['celular']?></td>
                <td><?=$employee['cpf']?></td>
                <td><?=$employee['ra']?></td>
                <td class="actions">
                    <a href="editarFuncionario.php?cpf=<?=$employee['cpf']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="apagarFuncionario.php?cpf=<?=$employee['cpf']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1): ?>
        <a href="listarFuncionario.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page*$records_per_page < $num_employees): ?>
        <a href="listarFuncionario.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>
<?=template_footer()?>

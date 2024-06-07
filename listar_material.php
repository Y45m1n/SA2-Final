<?php
include 'functions.php';

$pdo = pdo_connect_pgsql();

// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 10;

// Preparar a instrução SQL e obter registros da tabela de materiais, LIMIT irá determinar a página
$stmt = $pdo->prepare('SELECT * FROM materiais ORDER BY codigosap OFFSET :offset LIMIT :limit');
$stmt->bindValue(':offset', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Buscar os registros para exibi-los em nosso modelo.
$materiais = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obter o número total de materiais, isso é para determinar se deve haver um botão de próxima e anterior
$num_materiais = $pdo->query('SELECT COUNT(*) FROM materiais')->fetchColumn();
?>

<?=template_header('Lista de Materiais')?>
<link rel="stylesheet" href="index.css">

<div class="content read">
    <table>
        <thead>
            <tr>
                <td>Nome do Material</td>
                <td>Quantidade</td>
                <td>Data de Entrada</td>
                <td>Tipo de Material</td>
                <td>Código SAP</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materiais as $material): ?>
            <tr>
                <td><?=$material['nome_material']?></td>
                <td><?=$material['quantidade']?></td>
                <td><?=$material['data_entrada']?></td>
                <td><?=$material['tipo_material']?></td>
                <td><?=$material['codigosap']?></td>
                <td class="actions">
                    <a href="editarMaterial.php?codigosap=<?=$material['codigosap']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="apagarMaterial.php?codigosap=<?=$material['codigosap']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                    <a href="retirarMaterial.php?codigosap=<?=$material['codigosap']?>" class="trash"><i class="fas fa-buy fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1): ?>
        <a href="?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page*$records_per_page < $num_materiais): ?>
        <a href="?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>
<?=template_footer()?>

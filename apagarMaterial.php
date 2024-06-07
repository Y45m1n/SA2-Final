<?php
include 'functions.php';

$pdo = pdo_connect_pgsql();
$msg = '';

if (isset($_GET['codigosap'])) {
    // Seleciona o registro que será deletado
    $stmt = $pdo->prepare('SELECT * FROM materiais WHERE codigosap = ?');
    $stmt->execute([$_GET['codigosap']]);
    $material = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$material) {
        exit('Material Não Localizado!');
    }
    // Certifique-se de que o usuário confirma antes da exclusão
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // O usuário clicou no botão "Sim", deleta o registro
            $stmt = $pdo->prepare('DELETE FROM materiais WHERE codigosap = ?');
            $stmt->execute([$_GET['codigosap']]);
            $msg = 'Material Apagado com Sucesso!';
        } else {
            // O usuário clicou no botão "Não", redireciona de volta para a página de listagem
            header('Location: listar_material.php');
            exit;
        }
    }
} else {
    exit('Nenhum material especificado!');
}
?>


<?=template_header('Apagar Material')?>
<link rel="stylesheet" href="style.css">

<div class="content delete">
    <h2>Apagar Material - <?=$material['nome_material']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
    <p>Você tem certeza que deseja apagar o material #<?=$material['nome_material']?>?</p>
    <div class="yesno">
        <a href="apagarMaterial.php?codigosap=<?=$material['codigosap']?>&confirm=yes">Sim</a>
        <a href="apagarMaterial.php?codigosap=<?=$material['codigosap']?>&confirm=no">Não</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>

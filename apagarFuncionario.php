<?php
include 'functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';

if (isset($_GET['cpf'])) {
    // Seleciona o registro que será deletado
    $stmt = $pdo->prepare('SELECT * FROM funcionario WHERE cpf = ?');
    $stmt->execute([$_GET['cpf']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Funcionario Não Localizado!');
    }
    // Certifique-se de que o usuário confirma antes da exclusão
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // O usuário clicou no botão "Sim", deleta o registro
            $stmt = $pdo->prepare('DELETE FROM funcionario WHERE cpf = ?');
            $stmt->execute([$_GET['cpf']]);
            $msg = 'funcionario Apagado com Sucesso!';
        } else {
            // O usuário clicou no botão "Não", redireciona de volta para a página de leitura
            header('Location: listarfuncionario.php');
            exit;
        }
    }
} else {
    exit('Nenhum funcionario especificado!');
}
?>


<?=template_header('Apagar funcionario')?>
<link rel="stylesheet" href="style.css">

<div class="content delete">
<a href="indexFuncionario.php"><i class="fas fa-home"></i>Home Funcionario</a>
    <h2>Apagar funcionario----  <?=$contact['nome']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
    <p>Você tem certeza que deseja apagar o funcionario #<?=$contact['nome']?>?</p>
    <div class="yesno">
        <a href="apagarfuncionario.php?cpf=<?=$contact['cpf']?>&confirm=yes">Sim</a>
        <a href="apagarfuncionario.php?cpf=<?=$contact['cpf']?>&confirm=no">Não</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>
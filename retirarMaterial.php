<?php
include 'functions.php';

$pdo = pdo_connect_pgsql();
$msg = '';

// Verifica se o ID do material existe na URL
if (isset($_GET['codigosap'])) {
    // Verifica se o formulário foi enviado
    if (!empty($_POST)) {
        // Define as variáveis com os valores do formulário
        $data_retirada = isset($_POST['data_retirada']) ? $_POST['data_retirada'] : '';
        $retirador = isset($_POST['retirador']) ? $_POST['retirador'] : '';
        $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : '';
        $codigosap = isset($_POST['codigosap']) ? $_POST['codigosap'] : '';

        // Verifica se a quantidade retirada é válida
        if ($quantidade <= 0) {
            $msg = 'A quantidade deve ser maior que zero.';
        } else {
            // Verifica se há estoque suficiente para a retirada
            $stmt = $pdo->prepare('SELECT quantidade FROM materiais WHERE codigosap = ?');
            $stmt->execute([$codigosap]);
            $material = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$material) {
                exit('Material não encontrado!');
            }

            if ($quantidade > $material['quantidade']) {
                $msg = 'Quantidade solicitada maior do que a disponível em estoque.';
            } else {
                // Insere a retirada no banco de dados
                $stmt = $pdo->prepare('INSERT INTO retiradas (codigosap, data_retirada, retirador, quantidade) VALUES (?, ?, ?, ?)');
                $stmt->execute([$codigosap, $data_retirada, $retirador, $quantidade]);

                // Atualiza a quantidade no estoque
                $new_quantity = $material['quantidade'] - $quantidade;
                $stmt = $pdo->prepare('UPDATE materiais SET quantidade = ? WHERE codigosap = ?');
                $stmt->execute([$new_quantity, $codigosap]);

                $msg = 'Retirada realizada com sucesso!';
            }
        }
    }

    // Obtém os detalhes do material para preencher o formulário
    $stmt = $pdo->prepare('SELECT * FROM materiais WHERE codigosap = ?');
    $stmt->execute([$_GET['codigosap']]);
    $material = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o material existe
    if (!$material) {
        exit('Material não encontrado!');
    }
} else {
    exit('Nenhum material especificado!');
}
?>

<?=template_header('Retirar Material')?>
<link rel="stylesheet" href="style.css">

<div class="content update">
    <h2>Retirar Material - <?=$material['nome_material']?></h2>
    <form action="retirarMaterial.php?codigosap=<?=$material['codigosap']?>" method="post">
        <label for="data_retirada">Data de Retirada</label>
        <input type="date" name="data_retirada" id="data_retirada" required>
        <label for="retirador">Retirador</label>
        <input type="text" name="retirador" id="retirador" required>
        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" id="quantidade" required>
        <input type="hidden" name="codigosap" value="<?=$material['codigosap']?>">
        <input type="submit" value="Retirar">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>

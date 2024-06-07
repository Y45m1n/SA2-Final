<?php
include 'functions.php';

$pdo = pdo_connect_pgsql();
$msg = '';

// Verifica se o ID do material existe na URL
if (isset($_GET['codigosap'])) {
    // Verifica se o formulário foi enviado
    if (!empty($_POST)) {
        // Define as variáveis com os valores do formulário
        $nome_material = isset($_POST['nome_material']) ? $_POST['nome_material'] : '';
        $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : '';
        $data_entrada = isset($_POST['data_entrada']) ? $_POST['data_entrada'] : '';
        $tipo_material = isset($_POST['tipo_material']) ? $_POST['tipo_material'] : '';
        $codigosap = isset($_POST['codigosap']) ? $_POST['codigosap'] : '';
        
        // Atualiza o registro no banco de dados
        $stmt = $pdo->prepare('UPDATE materiais SET nome_material = ?, quantidade = ?, data_entrada = ?, tipo_material = ?, codigosap = ? WHERE codigosap = ?');
        $stmt->execute([$nome_material, $quantidade, $data_entrada, $tipo_material, $codigosap, $_GET['codigosap']]);
        $msg = 'Material atualizado com sucesso!';
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

<?=template_header('Editar Material')?>
<link rel="stylesheet" href="style.css">

<div class="content update">
    <h2>Editar Material - <?=$material['nome_material']?></h2>
    <form action="editarMaterial.php?codigosap=<?=$material['codigosap']?>" method="post">
        <label for="nome_material">Nome do Material</label>
        <input type="text" name="nome_material" value="<?=$material['nome_material']?>" id="nome_material" required>
        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" value="<?=$material['quantidade']?>" id="quantidade">
        <label for="data_entrada">Data de Entrada</label>
        <input type="date" name="data_entrada" value="<?=$material['data_entrada']?>" id="data_entrada" required>
        <label for="tipo_material">Tipo de Material</label>
        <select name="tipo_material" id="tipo_material" required>
            <option value="Metal" <?=$material['tipo_material'] == 'Metal' ? 'selected' : ''?>>Metal</option>
            <option value="Plástico" <?=$material['tipo_material'] == 'Plástico' ? 'selected' : ''?>>Plástico</option>
            <option value="Madeira" <?=$material['tipo_material'] == 'Madeira' ? 'selected' : ''?>>Madeira</option>
            <option value="Vidro" <?=$material['tipo_material'] == 'Vidro' ? 'selected' : ''?>>Vidro</option>
            <option value="Papel e Papelão" <?=$material['tipo_material'] == 'Papel e Papelão' ? 'selected' : ''?>>Papel e Papelão</option>
            <option value="Tecido e Têxtil" <?=$material['tipo_material'] == 'Tecido e Têxtil' ? 'selected' : ''?>>Tecido e Têxtil</option>
            <option value="Cerâmica" <?=$material['tipo_material'] == 'Cerâmica' ? 'selected' : ''?>>Cerâmica</option>
            <option value="Borracha" <?=$material['tipo_material'] == 'Borracha' ? 'selected' : ''?>>Borracha</option>
            <option value="Eletrônico" <?=$material['tipo_material'] == 'Eletrônico' ? 'selected' : ''?>>Eletrônico</option>
            <option value="Químico" <?=$material['tipo_material'] == 'Químico' ? 'selected' : ''?>>Químico</option>
        </select>
        <label for="codigosap">Código SAP</label>
        <input type="text" name="codigosap" value="<?=$material['codigosap']?>" id="codigosap" required>
        <input type="submit" value="Atualizar">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>

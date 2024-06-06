<?php
include 'functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se o ID do contato existe, por exemplo, update.php?id=1 irá obter o contato com o id 1
if (isset($_GET['cpf'])) {
    if (!empty($_POST)) {
        // Esta parte é semelhante ao create.php, mas aqui estamos atualizando um registro e não inserindo
     
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
        $ra = isset($_POST['ra']) ? $_POST['ra'] : '';
        // Atualiza o registro
        $stmt = $pdo->prepare('UPDATE funcionario SET  nome = ?, endereco = ?, email = ?,  celular = ?, cpf = ?, ra = ? WHERE cpf = ?');
        $stmt->execute([$nome, $endereco, $email, $celular, $cpf, $ra, $_GET['cpf']]);
        $msg = 'Atualização Realizada com Sucesso!';
    }
    // Obter o contato da tabela funcionario
    $stmt = $pdo->prepare('SELECT * FROM funcionario WHERE cpf = ?');
    $stmt->execute([$_GET['cpf']]);
    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$funcionario) {
        exit('Funcionario Não Localizado!');
    }
} else {
    exit('Nenhum funcionario Especificado!');
}
?>


<?=template_header('Atualizar/Alterar funcionario')?>
<link rel="stylesheet" href="style.css">

<div class="content update">

    <h2>Atualizar funcionario ---- <?=$funcionario['nome'],' '?></h2>
    <form action="editarfuncionario.php?cpf=<?=$funcionario['cpf']?>" method="post">
        <label for="nome">nome</label>
        <label for="endereco">endereco</label>
        <input type="text" name="nome" placeholder="nome" value="<?=$funcionario['nome']?>" id="nome">
        <input type="text" name="endereco" placeholder="endereco" value="<?=$funcionario['endereco']?>" id="endereco">
        <label for="email">email</label>
        <label for="celular">celular</label>
        <input type="text" name="email" placeholder="email" value="<?=$funcionario['email']?>" id="email">
        <input type="text" name="celular" placeholder="celular" value="<?=$funcionario['celular']?>" id="celular">
        <label for="cpf">CPF</label>
        <label for="ra">RA</label>
        <input type="text" name="cpf" placeholder="cpf" value="<?=$funcionario['cpf']?>" id="cpf">
        <input type="text" name="ra" placeholder="ra" value="<?=$funcionario['ra']?>" id="ra">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
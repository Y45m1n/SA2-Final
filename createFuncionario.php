<?php
include 'functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';

// Verifica se os dados POST não estão vazios
if (!empty($_POST)) {
    // Se os dados POST não estiverem vazios, insere um novo registro
    // Configura as variáveis que serão inseridas. Devemos verificar se as variáveis POST existem e, se não existirem, podemos atribuir um valor padrão a elas.
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $ra = isset($_POST['ra']) ? $_POST['ra'] : '';

    // Insere um novo registro na tabela funcionario
    $stmt = $pdo->prepare('INSERT INTO funcionario (nome, endereco, email, celular, cpf, ra) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$nome, $endereco, $email, $celular, $cpf, $ra]);
    // Mensagem de saída
    $msg = 'Funcionário cadastrado com sucesso!';
}
?>

<?=template_header('Cadastro de Funcionário')?>

<div class="content update">
    <h2>Registrar funcionário</h2>
    <form action="createFuncionario.php" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" placeholder="Seu Nome" id="nome">
        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" placeholder="Seu Endereço" id="endereco">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="seuemail@seuprovedor.com.br" id="email">
        <label for="celular">Celular</label>
        <input type="text" name="celular" placeholder="(XX) X.XXXX-XXXX" id="celular">
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" placeholder="CPF" id="cpf">
        <label for="ra">RA</label>
        <input type="text" name="ra" placeholder="RA" id="ra">
        <br>
        <div class="center">
            <input type="submit" value="Criar">
        </div> 
    </form>
  
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>

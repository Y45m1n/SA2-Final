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


<!-- <?php
// echo <<<EOT
// <!DOCTYPE html>
// <html>
//     <head>
//         <meta charset="utf-8">
//         <title>Cadastro de Funcionário</title>
//         <link href="index.css" rel="stylesheet" type="text/css">
//         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
//         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
//     </head>
//     <body>
//     <nav class="navtop">
//         <div>
//             <img src="img/logo.png" alt="Descrição da imagem">
//             <h1> Sistema de Gerenciamento de Estoque e Ativos Patrimoniais</h1>
//             <a href="indexFuncionario.php"><i class="fas fa-home"></i>Home</a>        
//         </div>
//     </nav>
// EOT;

// Função para fazer uma requisição POST para a API RESTful
// function criarFuncionario($data) {
//     $api_url = 'http://example.com/api/funcionarios'; // URL da API

//     $data_json = json_encode($data); // Converte os dados para JSON

//     $options = array( // Configura as opções da requisição
//         'http' => array(
//             'method' => 'POST',
//             'header' => 'Content-Type: application/json',
//             'content' => $data_json
//         )
//     );

//     $context = stream_context_create($options); // Inicializa o contexto da requisição

//     $result = file_get_contents($api_url, false, $context); // Realiza a requisição para a API

//     return $result !== false;
// }

// $msg = '';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    // $data = array(
    //     'nome' => $_POST['nome'],
    //     'endereco' => $_POST['endereco'],
    //     'email' => $_POST['email'],
    //     'celular' => $_POST['celular'],
    //     'cpf' => $_POST['cpf'],
    //     'ra' => $_POST['ra']
    // );

    // Chama a função para criar um funcionário na API
//     if (criarFuncionario($data)) {
//         $msg = 'Funcionário cadastrado com sucesso!';
//     } else {
//         $msg = 'Erro ao cadastrar funcionário';
//     }
// }
// ?>

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

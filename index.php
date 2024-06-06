<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENAI - Login Funcionário</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <?php
    include 'functions.php';

    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conectar ao banco de dados usando a função pdo_connect_pgsql() definida em functions.php
        $pdo = pdo_connect_pgsql();

        // Verifica se a conexão foi bem-sucedida
        if ($pdo) {
            // Obter RA e CPF do formulário
            $ra = $_POST['ra'];
            $cpf = $_POST['cpf'];

            try {
                // Consulta SQL para verificar o RA e CPF do funcionário
                $stmt = $pdo->prepare("SELECT id_funcionario FROM funcionario WHERE ra = :ra AND cpf = :cpf");
                $stmt->execute(['ra' => $ra, 'cpf' => $cpf]);
                $row = $stmt->fetch();

                // Verifica se a consulta retornou resultados
                if ($row) {
                    // Iniciar a sessão se ainda não estiver iniciada
                    session_start();

                    // Definir uma variável de sessão para identificar o usuário como logado
                    $_SESSION['logged_in'] = true;

                    // Redirecionar para a página de sucesso
                    header("Location: indexFuncionario.php");
                    exit;
                } else {
                    // RA ou CPF incorretos
                    echo "RA ou CPF incorretos";
                }
            } catch (PDOException $exception) {
                // Log do erro ou exibição de mensagem mais detalhada.
                $errorDetails = 'Error details: ' . $exception->getMessage() . ' Code: ' . $exception->getCode();
                error_log('Failed to execute SQL query: ' . $errorDetails);
                exit('Failed to execute SQL query. Check error log for details. Debug: ' . $errorDetails);
            }
        } else {
            // Se a conexão falhou
            echo "Falha na conexão com o banco de dados.";
        }
    }
    ?>

    <?= template_header('SENAI') ?>

    <div class="login-container">
        <div class="login-form">
            <h1>Login Funcionário</h1>
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input placeholder="RA" id="ra" name="ra" type="text">
                <input placeholder="CPF" id="cpf" name="cpf" type="password">
                <button class="btn" type="submit">Login</button>
            </form>
        </div>
    </div>

    <?= template_footer() ?>

</body>

</html>

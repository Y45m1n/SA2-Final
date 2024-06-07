<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Materiais</title>
    <link rel="stylesheet" href="estoque.css">
</head>
<body>
<div class="container">
  <h1>Cadastro de Materiais</h1>
  <?php
    include 'functions.php';
    $pdo = pdo_connect_pgsql();
    $msg = '';

    // Verifica se os dados POST não estão vazios
    if (!empty($_POST)) {
        // Se os dados POST não estiverem vazios, insere um novo registro
        // Configura as variáveis que serão inseridas. Devemos verificar se as variáveis POST existem e, se não existirem, podemos atribuir um valor padrão a elas.
        $nome_material = isset($_POST['nome_material']) ? $_POST['nome_material'] : '';
        $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : '';
        $data_entrada = isset($_POST['data_entrada']) ? $_POST['data_entrada'] : '';
        $tipo_material = isset($_POST['tipo_material']) ? $_POST['tipo_material'] : '';

        // Insere um novo registro na tabela de materiais
        $stmt = $pdo->prepare('INSERT INTO materiais (nome_material, quantidade, data_entrada, tipo_material) VALUES (?, ?, ?, ?)');
        $stmt->execute([$nome_material, $quantidade, $data_entrada, $tipo_material]);
        // Mensagem de saída
        $msg = 'Material cadastrado com sucesso!';
    }
  ?>
  <form action="cadastro_estoque.php" method="post">
    <div class="form-row">
      <div class="form-column">
        <label for="nome_material">Nome do Material</label>
        <input type="text" id="nome_material" name="nome_material" required>
      </div>
      <div class="form-column">
        <label for="quantidade">Quantidade</label>
        <input type="number" id="quantidade" name="quantidade">
      </div>
      <div class="form-column">
        <label for="data_entrada">Data de Entrada</label>
        <input type="date" id="data_entrada" name="data_entrada" required>
      </div>
      <div class="form-column">
        <label for="tipo_material">Tipo de Material</label>
        <select id="tipo_material" name="tipo_material" required>
          <option value="">Selecione o tipo</option>
          <option value="Metal">Metal</option>
          <option value="Plástico">Plástico</option>
          <option value="Madeira">Madeira</option>
          <option value="Vidro">Vidro</option>
          <option value="Papel e Papelão">Papel e Papelão</option>
          <option value="Tecido e Têxtil">Tecido e Têxtil</option>
          <option value="Cerâmica">Cerâmica</option>
          <option value="Borracha">Borracha</option>
          <option value="Eletrônico">Eletrônico</option>
          <option value="Químico">Químico</option>
        </select>
      </div>
    </div>
    <input type="submit" value="Cadastrar">
  </form>
  <?php if ($msg): ?>
    <p><?=$msg?></p>
  <?php endif; ?>
</div>
</body>
</html>

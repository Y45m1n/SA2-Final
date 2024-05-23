<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Patrimônio</title>
    <link rel="stylesheet" href="patrimonios.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Patrimônio</h1>
        <form action="processa_formulario.php" method="post">
            <div class="form-row">
                <div class="form-column">
                    <label for="numero_patrimonio">Número de Patrimônio:</label>
                    <input type="text" id="numero_patrimonio" name="numero_patrimonio" required>
                </div>
                <div class="form-column">
                    <label for="nome_produto">Nome do Produto:</label>
                    <input type="text" id="nome_produto" name="nome_produto" required>
                </div>
                <div class="form-column">
                    <label for="data_aquisicao">Data de Aquisição:</label>
                    <input type="date" id="data_aquisicao" name="data_aquisicao" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="fornecedor">Fornecedor:</label>
                    <input type="text" id="fornecedor" name="fornecedor">
                </div>
                <div class="form-column">
                    <label for="custo_aquisicao">Custo de Aquisição:</label>
                    <input type="number" step="0.01" id="custo_aquisicao" name="custo_aquisicao">
                </div>
                <div class="form-column">
                    <label for="localizacao">Localização:</label>
                    <input type="text" id="localizacao" name="localizacao">
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="responsavel">Responsável:</label>
                    <input type="text" id="responsavel" name="responsavel">
                </div>
                <div class="form-column">
                    <label for="valor_original">Valor Original:</label>
                    <input type="number" step="0.01" id="valor_original" name="valor_original">
                </div>
                <div class="form-column">
                    <label for="vida_util_estimada">Vida Útil Estimada (anos):</label>
                    <input type="number" id="vida_util_estimada" name="vida_util_estimada">
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="status_atual">Status Atual:</label>
                    <input type="text" id="status_atual" name="status_atual">
                </div>
                <div class="form-column">
                    <label for="data_ultima_manutencao">Data da Última Manutenção:</label>
                    <input type="date" id="data_ultima_manutencao" name="data_ultima_manutencao">
                </div>
                <div class="form-column">
                    <label for="proxima_manutencao_programada">Próxima Manutenção Programada:</label>
                    <input type="date" id="proxima_manutencao_programada" name="proxima_manutencao_programada">
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="fabricante">Fabricante:</label>
                    <input type="text" id="fabricante" name="fabricante">
                </div>
            </div>
            <div class="form-row">
                <label for="descricao_produto">Descrição do Produto:</label>
                <textarea id="descricao_produto" name="descricao_produto"></textarea>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>

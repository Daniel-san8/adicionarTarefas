<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Tarefas</title>
</head>
<body>
    <h1>Controle de Tarefas</h1>

    <h2>Adicionar Categoria</h2>
    <form method="POST" action="./cadastrarCat.php">
        <label for="nome">Nome da Categoria:</label><br>
        <input type="text" id="nome" name="nome" required><br>
        <button type="submit">Adicionar Categoria</button>
    </form>

    <h2>Adicionar Responsável</h2>
    <form method="POST" action="./cadastrarUser.php">
        <label for="nome">Nome do Responsável:</label><br>
        <input type="text" id="nome" name="nome" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <button type="submit">Adicionar Responsável</button>
    </form>

    <h2>Adicionar Tarefa</h2>
    <form method="POST" action="./cadastrarTaf.php">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br>
        <label for="descricao">Descrição:</label><br>
        <textarea name="descricao" id="descricao" required></textarea><br>
        
        <label for="categoria_id">Categoria:</label><br>
        <select name="categoria_id" id="categoria_id" required>
            <?php
            @require_once('../conexao.php');
            $categorias = $pdo->query('SELECT * FROM categorias')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categorias as $categoria) {
                echo "<option value=\"{$categoria['id']}\">{$categoria['nome']}</option>";
            }
            ?>
        </select><br>

        <label for="responsavel_id">Responsável:</label><br>
        <select name="responsavel_id" id="responsavel_id" required>
            <?php
            $responsaveis = $pdo->query('SELECT * FROM responsaveis')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($responsaveis as $responsavel) {
                echo "<option value=\"{$responsavel['id']}\">{$responsavel['nome']}</option>";
            }
            ?>
        </select><br>

        <button type="submit">Adicionar Tarefa</button>
    </form>

    <h2>Lista de Tarefas</h2>
    <a href="listaTarefas.php">Ver Tarefas</a>
</body>
</html>

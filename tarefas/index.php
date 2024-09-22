<?php
require_once('../conexao.php');

// Adicionar Tarefa
if (isset($_POST['adicionar'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $query = $pdo->prepare('INSERT INTO tarefas (titulo, descricao) VALUES (:titulo, :descricao)');
    $query->bindParam(':titulo', $titulo);
    $query->bindParam(':descricao', $descricao);
    $query->execute();
    header('Location: index.php');
}

// Atualizar Tarefa
if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $query = $pdo->prepare('UPDATE tarefas SET titulo = :titulo, descricao = :descricao, status = :status WHERE id = :id');
    $query->bindParam(':titulo', $titulo);
    $query->bindParam(':descricao', $descricao);
    $query->bindParam(':status', $status);
    $query->bindParam(':id', $id);
    $query->execute();
    header('Location: index.php');
}

// Excluir Tarefa
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $query = $pdo->prepare('DELETE FROM tarefas WHERE id = :id');
    $query->bindParam(':id', $id);
    $query->execute();
    header('Location: index.php');
}

// Obter todas as tarefas
$query = $pdo->prepare('SELECT * FROM tarefas');
$query->execute();
$tarefas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Tarefas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h1>Painel de Tarefas</h1>

<!-- Formulário para Adicionar Tarefa -->
<form method="POST" action="../actions/adicionar.php">
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo" required><br>
    <label for="descricao">Descrição:</label><br>
    <textarea name="descricao" id="descricao"></textarea><br>
    <button type="submit" name="adicionar">Adicionar Tarefa</button>
</form>

<hr>

<!-- Tabela de Tarefas -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Data de Criação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tarefas as $tarefa): ?>
        <tr>
            <td><?php echo $tarefa['id']; ?></td>
            <td><?php echo $tarefa['titulo']; ?></td>
            <td><?php echo $tarefa['descricao']; ?></td>
            <td><?php echo $tarefa['status']; ?></td>
            <td><?php echo $tarefa['data_criacao']; ?></td>
            <td>
                <!-- Botão de Editar -->
                <button onclick="document.getElementById('editar-<?php echo $tarefa['id']; ?>').style.display='block'">Editar</button>
                <!-- Botão de Excluir -->
                <a href="?excluir=<?php echo $tarefa['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">Excluir</a>

                <!-- Formulário de Edição (oculto por padrão) -->
                <div id="editar-<?php echo $tarefa['id']; ?>" style="display:none;">
                    <form method="POST" action="index.php">
                        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
                        <label for="titulo">Título:</label><br>
                        <input type="text" name="titulo" value="<?php echo $tarefa['titulo']; ?>" required><br>
                        <label for="descricao">Descrição:</label><br>
                        <textarea name="descricao"><?php echo $tarefa['descricao']; ?></textarea><br>
                        <label for="status">Status:</label><br>
                        <select name="status">
                            <option value="Pendente" <?php if($tarefa['status'] == 'Pendente') echo 'selected'; ?>>Pendente</option>
                            <option value="Em Andamento" <?php if($tarefa['status'] == 'Em Andamento') echo 'selected'; ?>>Em Andamento</option>
                            <option value="Concluída" <?php if($tarefa['status'] == 'Concluída') echo 'selected'; ?>>Concluída</option>
                        </select><br>
                        <button type="submit" name="atualizar">Atualizar Tarefa</button>
                    </form>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>

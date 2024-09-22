<?php
require_once('../conexao.php');

$query = $pdo->query('SELECT t.*, c.nome AS nome_categoria, r.nome AS nome_responsavel FROM tarefas t LEFT JOIN categorias c ON t.categoria_id = c.id LEFT JOIN responsaveis r ON t.responsavel_id = r.id');
$tarefas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Lista de Tarefas</h1>

<table>
    <tr>
        <th>Título</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th>Responsável</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($tarefas as $tarefa): ?>
    <tr>
        <td><?php echo $tarefa['titulo']; ?></td>
        <td><?php echo $tarefa['descricao']; ?></td>
        <td><?php echo $tarefa['nome_categoria']; ?></td>
        <td><?php echo $tarefa['nome_responsavel']; ?></td>
        <td><?php echo $tarefa['status']; ?></td>
        <td>
            <form method="POST" action="./atualizarTaf.php" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
                <input type="hidden" name="acao" value="iniciar">
                <button type="submit">Iniciar</button>
            </form>
            <form method="POST" action="./atualizarTaf.php" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
                <input type="hidden" name="acao" value="pausar">
                <button type="submit">Pausar</button>
            </form>
            <form method="POST" action="./atualizarTaf.php" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
                <input type="hidden" name="acao" value="finalizar">
                <input type="number" name="valor_cobrado" placeholder="Valor" required>
                <button type="submit">Finalizar</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

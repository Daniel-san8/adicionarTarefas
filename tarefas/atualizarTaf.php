<?php
require_once('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $acao = $_POST['acao'];

    if ($acao === 'iniciar') {
        $query = $pdo->prepare('UPDATE tarefas SET data_inicio = NOW(), status = "em andamento" WHERE id = :id AND status = "pendente"');
    } elseif ($acao === 'pausar') {
        $query = $pdo->prepare('UPDATE tarefas SET data_pausa = NOW(), status = "pendente" WHERE id = :id AND status = "em andamento"');
    } elseif ($acao === 'finalizar') {
        $valor_cobrado = $_POST['valor_cobrado'];
        $query = $pdo->prepare('UPDATE tarefas SET data_finalizacao = NOW(), valor_cobrado = :valor_cobrado, status = "finalizada" WHERE id = :id AND status = "em andamento"');
        $query->bindParam(':valor_cobrado', $valor_cobrado);
    }

    $query->bindParam(':id', $id);
    $query->execute();

    header('Location: ./listaTarefas.php');
    exit;
}
?>

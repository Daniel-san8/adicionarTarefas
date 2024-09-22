<?php
require_once('../conexao.php');


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


?>
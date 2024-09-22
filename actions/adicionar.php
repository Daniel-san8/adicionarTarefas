<?php

echo $_POST['titulo']. ' '. $_POST['descricao'];


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
    exit;
}

?>
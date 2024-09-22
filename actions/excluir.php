<?php

require_once('../conexao.php');


if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $query = $pdo->prepare('DELETE FROM tarefas WHERE id = :id');
    $query->bindParam(':id', $id);
    $query->execute();
    header('Location: index.php');
}

?>
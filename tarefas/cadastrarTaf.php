<?php
require_once('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];
    $responsavel_id = $_POST['responsavel_id'];

    $query = $pdo->prepare('INSERT INTO tarefas (titulo, descricao, categoria_id, responsavel_id) VALUES (:titulo, :descricao, :categoria_id, :responsavel_id)');
    $query->bindParam(':titulo', $titulo);
    $query->bindParam(':descricao', $descricao);
    $query->bindParam(':categoria_id', $categoria_id);
    $query->bindParam(':responsavel_id', $responsavel_id);
    $query->execute();

    header('Location: ../index.php');
    exit;
}
?>

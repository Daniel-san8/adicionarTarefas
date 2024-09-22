<?php
require_once('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $query = $pdo->prepare('INSERT INTO responsaveis (nome, email) VALUES (:nome, :email)');
    $query->bindParam(':nome', $nome);
    $query->bindParam(':email', $email);
    $query->execute();

    header('Location: ../index.php');
    exit;
}
?>

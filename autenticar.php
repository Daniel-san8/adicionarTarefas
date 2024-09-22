<?php

require_once('./conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];


$query = $pdo->prepare('SELECT * FROM responsaveis WHERE email = :email AND senha = :senha');

$query->bindValue(':email', $email);
$query->bindValue(':senha', $senha);
$query->execute();


$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg) {
    echo '<script>window.location.href="./tarefas"</script>';

} else {
    echo '<script>window.alert("Email ou Senha incorretos")</script>';
    echo '<script>window.location.href="./login.php"</script>';

}

?>
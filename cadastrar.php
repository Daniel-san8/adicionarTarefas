<?php
    require_once('conexao.php');

    @$email = $_POST['email'];
    @$nome = $_POST['nome'];
    @$senha = $_POST['senha'];

    $verificaEmail = $pdo->prepare('SELECT * FROM responsaveis WHERE email = :email');
    $verificaEmail->bindParam(':email', $email);
    $verificaEmail->execute();
    if($email && $nome && $senha) {

        try {
            $verificaEmail = $pdo->prepare('SELECT * FROM responsaveis WHERE email = :email');
            $verificaEmail->bindParam(':email', $email);
            $verificaEmail->execute();

            if ($verificaEmail->rowCount() > 0) {
                echo '<script>window.alert("Esse email já está cadastrado.")</script>';
                echo '<script>window.location.href="./"</script>';
            } else {
                $query = $pdo->prepare('INSERT INTO responsaveis (nome, email, senha) VALUES (:nome, :email, :senha)');
                $query->bindParam(':nome', $nome);
                $query->bindParam(':email', $email);
                $query->bindParam(':senha', $senha);
                $query->execute();

                echo '<script>window.alert("Usuário cadastrado com sucesso")</script>';
                echo '<script>window.location.href="./tarefas"</script>';
            }
        } catch (PDOException $e) {
            echo '<script>window.alert("Erro ao cadastrar o usuário: ' . $e->getMessage() . '")</script>';
        }
    } else {
        echo '<script>window.alert("Usuário contém informações inválidas")</script>';
        echo '<script>window.location.href="./"</script>';
    }
?>

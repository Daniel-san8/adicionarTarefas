<?php



?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .direita {
            display: flex;
            flex-direction: column;
            gap: 6px;

            margin-top: 5rem;

            border: 1px solid cadetblue;

            padding: 1rem 4rem;

            background-color: gray;
        }

        input[type='submit'] {
            margin-top: 1rem;
        }

    </style>
</head>
<body>
    <section id="direita">
    <form action="./autenticar.php" method="post" class="direita">
        <h2>Fazer Login</h2>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" required>

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>

        <input type="submit" value="Login">
    </form>  
    </section>
    
</body>
</html>
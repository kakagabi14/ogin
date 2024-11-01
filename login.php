<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="container">
        <div class="header-container">
            <h1>Login</h1>
        </div>
        <div class="form-container">
            <form action="login.php" method="POST">
                <label>Usuário</label>
                <input type="text" name="usuario" required><br>

                <label>Senha</label>
                <input type="password" name="senha" required><br>

                <button type="submit">Entrar</button><br><br>
            </form>
        </div>
    </div>
</body>

</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        include "conexao.php";

        $sql = "SELECT *  FROM usuario
                WHERE usuario = '$usuario'
                AND senha = '$senha'";

        $resultado = mysqli_query($con, $sql);

        if(mysqli_num_rows($resultado)> 0 ){
            echo "Login realizado com sucesso!";
            header('location: index.html');
        } else{
            echo "Login inválido!";
            }

    }
?>
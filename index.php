<?php
include('conexao.php');


if(isset($_POST['email']) || isset($_POST['senha'])){

    if(Strlen($_POST['email']) == 0){
    echo "Preencha seu email";
} else if(Strlen($_POST['senha']) == 0){
    echo('Preencha sua senha');
} else{

    $email = $mysqli->real_escapestring($_POST['email']);
    $email = $mysqli->real_escapestring($_POST['senha']);
 
    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha ='$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo sql: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1){

        $usuario = $sql_query->fetch_assoc()

    } else {
        echo "Falha ao logar! E-mail ou senha incorretos";
    }

    }

 }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <title>Login page</title>
</head>
<body>
   <div class="main-login">
    <div class="left-login">
        <h1>Faça login <br>E entre para o nosso time</h1>
        <img src="./assets/login.svg" class="left-login-image" alt="login">
    </div>
    <div class="right-login">
        <div class="card-login">
            <h1>LOGIN</h1>
            <div class="textfield">
                <label for="usuario">Usuário</label>
                <input type="text" name="usuario" placeholder="Usuário">
            </div>

            <div class="textfield">
                <label for="senha">Senha</label>
                <input type="password" name="senha" placeholder="Senha">
            </div>
            <button class="btn-login">Login</button>
        </div>
    </div>
   </div>
</body>
<script src="./index.js"></script>
</html>
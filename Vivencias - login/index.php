<?php
include('conexao.php');
if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        ;
    } else if(strlen($_POST['senha']) == 0) {
        ;
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: mainPage.html");

        } else {
            ;
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Login</title>
</head>
<body>
    <div class="main-login">
        <div class="login-esquerda"> 
            <h1>Faça login na sua conta<br>para ter acesso a plataforma</h1>
            <img src="blog_imagem.svg" class="imagem-login" alt="blog">
        </div>
    <form action="" method="POST">
        <div class="login-direita">
            <div class="card-login">
                <div class="textfield">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Insira seu e-mail">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Insira sua senha">
                </div>
                <button class="btn-login" type="submit" onclick="Validar();">Entrar</button>
            </div>
        </div>
    </form>
    </div>
    <script>
    function Validar()
    {


        if(email.value=="")
        {
            alert("Por favor, preencha seu email");
        }

         if(senha.value=="")
        {
            alert("Por favor, preencha sua senha");
        }
        if($quantidade !== 1)
        {
            alert("Email ou senha incorretos");
        }
    }

</script>
</body>
</html>
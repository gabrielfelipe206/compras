<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Login</title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <script type="text/javascript">
        function loginsuccessfully(){
            setTimeout("window.location='painel1.php'", 5000);
        }

        function loginfailed(){
            setTimeout("window.location='login.php'", 5000);
        }
    </script>


</head>
<body>
<!-----------------------FORMULARIO PARA LOGIN------------------------->
<form name="loginform" method="POST" action="userauthentication.php">
        <div class="box">
            <h1>Login</h1>
            <div class="txt">
                <label><strong>E-mail:</strong></label>
                <input type="text" name="email" placeholder="Digite seu e-mail">
            </div>

            <div class="txt">
                <label for="senha"><strong>Senha:</strong></label>
                <input type="password" name="senha" placeholder="Digite sua senha">
            </div>

            
            <input type="submit" value="Entrar" name="Entrar">

            <div class="link">
                Não é registrado? <a href="http://localhost/compras/cadastro.php">Clique aqui</a>

            </div>

        </div>
</form>
    
</body>
</html>

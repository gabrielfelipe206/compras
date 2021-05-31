<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "cadastroloja";
$conexao = @mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());
$db_selected = mysqli_select_db($conexao, $banco) or die(mysqli_error());

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Autenticando Usuario</title>
    <script type="text/javascript">
        function loginsuccessfully(){
            setTimeout("window.location='painel1.php'");
        }

        function loginfailed(){
            setTimeout("window.location='login.php'", 5000);
        }
    </script>
</head>
<body>

<?php
$email = $_POST['email'];
$senha = $_POST['senha'];
	
$sql = mysqli_query($conexao,"SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'") or die(mysqli_error());

$row = mysqli_num_rows($sql);
if ($row > 0){
    session_start();
    $_SESSION['email']=$_POST['email'];
    $_SESSION['senha']=$_POST['senha'];
    
    echo "<script>loginsuccessfully()</script>";
} else{
    echo "<center><h1>Nome de usuário ou senha inválidos! Aguarde um instante para tentar novamente.</h1></center>";
    echo "<script>loginfailed()</script>";
}
?>

</body>
</html>
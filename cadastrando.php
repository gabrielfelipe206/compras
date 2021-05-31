<!----------------------PAGINA DE CADASTRO--------------------->
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastrando...</title>
    <script type="text/javascript">
        function loginsuccessfully(){           
            setTimeout("window.location='login.php'");
        }
    </script>
</head>

<body>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "cadastroloja";
$conexao = @mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());
$db_selected = mysqli_select_db($conexao, $banco) or die(mysqli_error());

?>

<?php

$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];   
$email=$_POST['email'];
$senha=$_POST['senha'];

$sql = "INSERT INTO usuarios(nome, sobrenome, email, senha)
VALUES('$nome', '$sobrenome', '$email', '$senha')";
if (mysqli_query($conexao, $sql)) {  
    echo "<script>loginsuccessfully()</script>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conexao);}
    
    mysqli_close($conexao);
?>

</body>
</html>
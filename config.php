<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "carrinho compras";
$conexao = @mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());
$db_selected = mysqli_select_db($conexao, $banco) or die(mysqli_error());

?>
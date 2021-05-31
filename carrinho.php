
<!------CONECTANDO A BASE DE DADOS DO CARRINHO DE COMPRAS------------------>
<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "carrinho compras";
$conexao = @mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());
$db_selected = mysqli_select_db($conexao, $banco) or die(mysqli_error());
?>

<?php
    session_start();
?>

<?php

    if(isset($_SESSION['venda'])){

    }else{
        $_SESSION['venda'] = array();
    }


   
    if(isset($_GET['par'])){
        $Produto = $_GET['par'];
        $_SESSION['venda'] [$Produto] = 1;
    }
    
    if(isset($_GET['del'])){
        $Del = $_GET['del'];
        unset($_SESSION['venda'] [$Del]);
    }
?>

<!-----------------AREA SUPERIOR DA PAGINA------------------>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <title> Carrinho</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>
<body>

   
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="" width="125px">
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="http://localhost/compras/painel1.php?par=2">Home</a></li>
                    <li><a href="http://localhost/compras/painel1.php#produtos">Produtos</a></li>
                    <li><a href="http://localhost/compras/painel1.php#sobre">Sobre</a></li>
                    <li><a href="http://localhost/compras/painel1.php#contato">Contato</a></li>
                    <li><a href="http://localhost/compras/login.php">Login</a></li>
                    <li><a href="logout.php">Sair</a></li>
                </ul>
            </nav>
            <img src="images/cart.png" width="30px" height="30px">
            <img src="images/menu.png" class="menu-icon"
            onclick="menutoggle()">
        </div>        
    </div> 

<!-------------RESULTADO DO CARRINHO------------------>
<h2 class="title">Seus Produtos<h2>
<div class="small-container cart-page">

<table width="700" border="1">
<tr>
    <td>Produto</td>
    <td>Valor</td>
    <td>Quantidade</td>
    <td>Ações</td>
</tr>
<?php
    
    $Total=0;
    foreach($_SESSION['venda'] as $Prod => $Quantidade):

        $SqlCarrinho = "SELECT * FROM produto WHERE Id = '$Prod'";
        $result= mysqli_query($conexao, $SqlCarrinho);
        $ResAssoc = mysqli_fetch_assoc($result);
        echo'<tr>';
            echo '<td>'.$ResAssoc['Descricao'].'</td>';
            echo '<td>'.$ResAssoc['Preco'].'</td>';
            echo '<td>'.$Quantidade.'</td>';
            echo '<td><a href="carrinho.php?del='.$ResAssoc['Id'].'"> Remover Produto </a></td>';
            $Total += $ResAssoc ['Preco'] * $Quantidade;
        echo'</tr>';
    endforeach;

    echo '<tr>';        
        echo '<td colspan="4" align="right">R$ '.number_format($Total,2,",",".").'</td>';
    echo '</tr>';

?>


</table>
</div>
<!------------RODAPE--------------->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Baixe Nosso App</h3>
                    <p>Baixe o aplicativo para celular Android e iOS.</p>
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo-white.png">
                    <p>Nosso objetivo é levar a todos qualidade, conforto,<br>
                     comodidade e confiabilidade.
                </p>
                </div>
                <div class="footer-col-3">
                    <h3>Links Úteis</h3>
                    <ul>
                        <li>Cupons</li>
                        <li>Blog Post</li>
                        <li>Política de Devolução</li>
                        <li>Torne-se Afiliado</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Nossas Redes Sociais</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>YouTube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2021</p>
        </div>
    </div>

<!------------ js for toggle menu ------------->
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle(){
            if (MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
            else
                {
                    MenuItems.style.maxHeight = "0px";
                }
        }
    </script>

</body>
</html>
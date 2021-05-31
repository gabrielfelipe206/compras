<!------CONECTANDO A BASE DE DADOS CADASTROLOJA------------------>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "cadastroloja";
$conexao = @mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());
$db_selected = mysqli_select_db($conexao, $banco) or die(mysqli_error());
?>

<?php
    session_start();
    if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
        header ("Location: login.php");
        exit;
} 

?>

<!-----------------------------------INICIANDO SESSAO DO CARRINHO DE COMPRAS----------------------->

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

<!------------------------------------INICIANDO SESSAO DE PESQUISA--------------------------------->

<?php
    
    if(isset($_GET['nome_produto'])){

   

    $nome = "%".trim($_GET['nome_produto'])."%";

    $dbh = new PDO('mysql:host=localhost;dbname=carrinho compras', 'root', '');

    $sth = $dbh->prepare('SELECT * FROM `produto` WHERE `Descricao` LIKE :nome');
    $sth->bindParam(':nome', $nome, PDO::PARAM_STR);
    $sth->execute();

    $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!---------------------------------------AREA SUPERIOR DO SITE--------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <title> RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>
<?php
    include_once("config.php");
?>
<body>

    <div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="" width="125px">
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="">Home</a></li>
                    <li><a href="#produtos">Produtos</a></li>
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#contato">Contato</a></li>
                    <li><a href="http://localhost/ecco/login.php">Login</a></li>
                    <li><a href="logout.php">Sair</a></li>
                </ul>
            </nav>
            <a href="http://localhost/compras/carrinho.php"><img  src="images/cart.png" width="30px" height="30px"></a>
            <img src="images/menu.png" class="menu-icon"
            onclick="menutoggle()">
        </div>
        <div class="row">
            <div class="col-2">
               
               
            
                    <h1><br></h1>

                    <strong><p><br>
                    </p></strong>

                <a href="#produtos" class="btn">Destaques &#8594;</a><br>

                
                    <form action="" method="get" enctype="multipart/form-data">                    
                        <input type="text" name="nome_produto" class="pesquisa" placeholder="busque por produto, categoria ou marca...">
                        <button  class="botao"> buscar</button>
                    </form>
                
                
            </div>
                <div class="col-2">
                    <img src="">
                </div>
        </div>
    </div>
</div>

<!---------------------IMAGENS DEMONSTRATIVAS--------------------->

    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images/category-1.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="images/category-2.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="images/category-3.jpg" alt="">
                </div>
                
            </div>
        </div>
    </div>


<!-----------------------AREA DO CARRINHO | PRODUTOS EM DESTAQUE-------------------------->

<section id="produtos">

<h2 class="title">Produtos em Destaque</h2>
<div class="carrinho-container">


<ul>
    
<div class="produto">
    <?php

        $Sql = "SELECT * FROM produto WHERE Id < 5";
        $resultado= mysqli_query($conexao, $Sql);
        while ( $Res = mysqli_fetch_array($resultado))
        {
        
        $foto = $Res['foto'];
        $mostra = '../compras/fotos/'.$foto ;       
        
    ?>

    <div class="produto">     
        <li>     
            <img src="<?php echo $mostra ?>" />
            <strong>&#9733; &#9733; &#9733; &#9733; &#9733;</strong>
            <h4><span><?php echo $Res['Descricao']?></span></h4><br>
            <strong><a href="painel1.php?par=<?php echo $Res['Id']?>">Apenas R$ <?php echo number_format($Res['Preco'],2,",",".");?></a></strong>
            
        </li>
    </div>
    
    <?php
        }
    ?>

</ul>

</div>


</section>

<!-------------------------------RESULTADO DA BUSCA----------------------------------->



<ul>
<h2 class="title">Resultado da busca</h2>
    <div class="carrinho-container">
        <div class="produto"> 
            
            
            <?php
                    
                if (count($resultados)) {
                
                foreach($resultados as $Resultado) {
                    $foto = $Resultado['foto'];
                    $mostra = '../compras/fotos/'.$foto ;
            ?>
                
                <div class="produto">
                      
                    <li>     
                        <img src="<?php echo $mostra ?>" />
                        <strong>&#9733; &#9733; &#9733; &#9733; &#9733;</strong>
                        <h4><span><?php echo $Resultado['Descricao']?></span></h4><br>
                        <strong><a href="painel1.php?par=<?php echo $Resultado['Id']?>">Apenas R$ <?php echo number_format($Resultado['Preco'],2,",",".");?></a></strong>
                        
                    </li>
                </div>            

            <br>
            <?php 
            } } else {
            ?>
            <label>Não foram encontrados resultados pelo termo buscado.</label>
            <?php
            }
            ?>
        </div>
    </div>
</ul>





<!---------------------------------COMENTARIOS--------------------------------->
<h2 class="title">Nossas Avaliações</h2>
<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                &#9733; &#9733; &#9733; &#9733; &#9733;
                <p>Os produtos são maravilhosos
                    com certeza comprarei mais<br>
                      <br>                          
                </p>                  
                
                <img src="images/user-1.png">
                <h3>Pamela Cristina</h3>
            </div>

            <div class="col-3">
                &#9733; &#9733; &#9733; &#9733; &#9733;
                <p>Para quem busca qualidade
                esse é o lugar certo! <br>
                <br>
                </p>
               
                <img src="images/user-2.png">
                <h3>Thiago Henrique</h3>
            </div>

            <div class="col-3">
                &#9733; &#9733; &#9733; &#9733; &#9733;
                <p>Roupas de qualidade!, tudo
                    perfeito, indico a todos. <br>
                    <br>
                </p>
                
                <img src="images/user-3.png">
                <h3>Izabel Souza</h3>
            </div>

        </div>
    </div>
</div>


<!---------------------------------logos|patrocinio------------------------------>

<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="images/l1.png">
            </div>
            <div class="col-5">
                <img src="images/l2.png">
            </div>
            <div class="col-5">
                <img src="images/l3.png">
            </div>
            <div class="col-5">
                <img src="images/l4.png">
            </div>  
            <div class="col-5">
                <img src="images/l5.png">
            </div>                
        </div>
    </div>
</div>

<!---------------------------SOBRE------------------------------------------------->
<section id="sobre">
    <div class="offer">
        <div class="small-container">
            <div class="row">
               
                <div class="col-2">
                   
                    <h1>Quem Somos</h1>
                    <small>Somos uma loja online que oferece o melhor para os nossos clientes, onde podemos
                        atender todas as expectativas sobre a moda, sempre de olho nas tendências 
                        e lançamentos.
                        Nossa loja oferece o que há de mais moderno e atual em todas as categorias de produtos.
                        Desde o princípio, nossa preocupação é oferecer os melhores produtos com os melhores
                        preços aliado a um ótimo atendimento a você cliente, que é a pessoa mais importante para nós.</small><br>
                        <br>
                         <!--<p>Seja o primeiro a receber nossas ofertas e novidades!</p>
                       <div class="txt">                           
                            <input type="text" name="email" placeholder="Seu e-mail...">
                        </div>

                        <a href="" class="btn">Cadastrar &#8594;</a>--->
                </div>
            </div>
        </div>
    </div>
</section>



<!--------------------------------------RODAPE--------------------------------------->
<section id="contato">
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
</section>
<!---------------------------------js for toggle menu---------------------------------->
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
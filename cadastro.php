<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Cadastro</title>
    <link rel="stylesheet" type="text/css" href="stylecadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<form name="signup" method="POST" action="cadastrando.php">
        <div class="box">
            <h1>Cadastro</h1>
            <div class="txt">
                <label><strong>Nome:</strong></label>
                <input type="text" name="nome" placeholder="Digite seu nome">
            </div>

            <div class="txt">
                <label for="sobrenome"><strong>Sobrenome:</strong></label>
                <input type="text" name="sobrenome" placeholder="Digite seu sobrenome">
            </div>

            <div class="txt">
                <label for="email"><strong>E-mail:</strong></label>
                <input type="text" name="email" placeholder="Digite seu e-mail">
            </div>

            <div class="txt">
                <label for="senha"><strong>Senha:</strong></label>
                <input type="password" name="senha" placeholder="Digite sua senha">
            </div>

            
            <input type="submit" value="Cadastrar">

            <div class="link">
                Já é registrado? <a href="http://localhost/compras/login.php">Clique aqui</a>

            </div>

        </div>
</form>    
</body>
</html>
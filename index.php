<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>  
    <title>Login</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login'] == true) {
            echo"<script language='javascript' type='text/javascript'> 
            window.location.href='logado.php'</script>";
        } else { 
        ?>   
        <div class="container">
            <div class="all-form"> 
                <form action="login.php" method="POST" id="form"> 
                    <h1>Login</h1>
                    <div class="formulario">
                        <label for="usuario" >Nome de usuário: <br></label>  
                        <input class="controle" type="text" name="usuario">
                    </div>
                    <div class="formulario">
                        <label for="senha">Senha: <br></label>  
                        <input class="controle" type="password" name="senha"> 
                    </div> 
                    <div class="formulario">  
                        <button type="submit" name="enviar" id="botao" class="submit"> Logar </button> 
                    </div> 
                    <div class="formulario">
                        <a href="cadastrar.php">Ou Cadastrar-se</a>
                    </div>
                </form> 
            </div> 
        </div>
    <?php  
        }
    } else { 
    ?>  
    <div class="container">
        <div class="all-form"> 
            <form action="login.php" method="POST" id="form"> 
                <h1>Login</h1>
                <div class="formulario">
                    <label for="usuario" >Nome de usuário: <br></label>  
                    <input class="controle" type="text" name="usuario">
                </div>
                <div class="formulario">
                    <label for="senha">Senha: <br></label>  
                    <input class="controle" type="password" name="senha"> 
                </div>
                <button type="submit" name="enviar" id="botao" class="submit"> Logar </button> 
                <div class="formulario">
                    <a href="cadastrar.php">Ou Cadastrar-se</a>
                </div> 
            </form> 
        </div> 
    </div>
    <?php
    }
    ?> 
    </div>
</body>
</html>
<?php
if (isset($_POST['envio'])) { 
    if((!empty($_POST['usuario'])) or (!empty($_POST['senha'])) or (!empty($_POST['senha']))){
        if (($_POST['senha'] == $_POST['senha2'])) { 

            $con = new PDO('mysql:host=localhost;dbname=trabalho2e', 'root', '');

            $sth = $con->prepare("INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)"); 

            $sth->bindValue(':senha', $_POST["senha"]); 
            $sth->bindValue(':usuario', $_POST["usuario"]); 
            $sth->execute();  

            $sth->execute();  
            
            echo"<script language='javascript' type='text/javascript'> 
                window.location.href='index.php'</script>";

        }else{ 
            echo"<script language='javascript' type='text/javascript'> 
            alert('As senhas devem ser iguais!'); 
            </script>";
        } 
    }else{ 
        echo"<script language='javascript' type='text/javascript'> 
        alert('Usúario ou senha não podem ser nulos!'); 
        </script>";
    } 
}
?>  
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" > 
    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>  
    <title>Formulario League Of Legends</title>
</head>
<body>      
    <div class="container">   
        <div class="all-form"> 
            <form action="" method="POST" id="form">    
                <div class="formulario">  
                    <label for="usuario" >Nome de usuário: <br></label> <input class="usuario" type="text" name="usuario">
                </div>  
                <div class="formulario">  
                    <label for="senha">Senha: <br></label> <input class="senha" type="password" name="senha"> 
                </div>  
                <div class="formulario">  
                    <label for="senha2">Senha: <br></label> <input class="senha" type="password" name="senha2"> 
                </div>  
                <div class="formulario"> 
                    <button type="submit" name="envio" id="envio" class="submit"> Cadastrar </button> 
                </div>  
            </form>    
        </div>        
    </div>      
</body>
</html>
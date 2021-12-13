<?php   
    session_start();
    echo "<script language='javascript' type='text/javascript'>  
        alert('Bem vindo, ".$_SESSION['usuario']."');  
        </script>";
?>  
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" >      
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>  
</head>
<body>
    <div class="button"> 
            <button id="botao" class="submit"><a href="formulario.php">Formulário </a></button>
            <button id="botao" class="submit"><a href="deslogar.php">Deslogar </a></button>    
    </div>   
    <div class="container">  
        <div class="all-form">    
        <?php
                $con = new PDO('mysql:host=127.0.0.1;dbname=trabalho2e', 'root', '');   

                $sth = $con->prepare("SELECT * FROM formulario");

                $sth->execute();

                $rows = $sth->fetchAll();
                foreach($rows as $r) {
                    echo "Nome:".$r['nome']. 
                        "<br> Email:".$r['email']. 
                        "<br> Idade:".$r['idade']. 
                        "<br> Região:".$r['regiao']. 
                        "<br> Plataforma:".$r['plataforma'].  
                        "<br> Rota(s):".$r['rota']. 
                        "<br> Estilo de jogo:".$r['comentario']."<br><br>"; 
                    echo"<form action='mudar.php' method=POST>  
                        <input type='hidden' value=".$r['id']." name='id'></input>
                        <button type='submit' name='edit' class='submit'>Editar</button>
                        <button type='submit' name='del' class='submit'>Deletar</button>
                        </form>"; 

                } 
            ?>
        </div>
    </div>
</body>
</html>
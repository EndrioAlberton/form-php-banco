<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" >      
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
    <div class="login">
    <?php

    $con = new PDO('mysql:host=localhost;dbname=trabalho2e', 'root', ''); 
     
    $sth = $con->prepare("SELECT usuario, senha FROM usuarios WHERE usuario = :usuario AND senha = :senha"); 
    
    $sth->bindValue(':senha', $_POST["senha"]); 
    $sth->bindValue(':usuario', $_POST["usuario"]); 
    $sth->execute();  

    $rows = $sth->fetchall();    
     
    print(count($rows));

    if ($rows){  
        session_start(); 
        $_SESSION['login'] = true;
        $_SESSION['usuario'] = $_POST['usuario'];  
        $_SESSION['senha'] = $_POST['senha']; 
        echo"<script language='javascript' type='text/javascript'> 
        window.location.href='logado.php'</script>";
    }else{
        echo"<script language='javascript' type='text/javascript'> 
         alert('Usúario ou senha incorretos!'); 
        window.location.href='index.php'</script>";
    } 
    
    ?>
    </div>    
</body>
</html>

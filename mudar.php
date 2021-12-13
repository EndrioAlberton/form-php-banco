<?php 
if (isset($_POST['del'])) {  

    $con = new PDO('mysql:host=localhost;dbname=trabalho2e', 'root', ''); 

    $sth = $con->prepare("DELETE FROM formulario WHERE id = :id");
    $sth->bindValue(':id', $_POST['id']);
    $sth->execute(); 
    echo"<script language='javascript' type='text/javascript'> 
            window.location.href='index.php'</script>";
} 
if (isset($_POST['enviarr'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $regiao = $_POST['regiao']; 
    if(!empty($_POST['plataforma'])){  
        $plataforma = $_POST['plataforma']; 
    }else{ 
        $plataforma = "Plataforma não selecionada";
    }  
    $rota_array = $_POST['rota'];  
    if(!empty($_POST['rota'])){  
        $rota_array = $_POST['rota'];  
        $rota = implode(";",$rota_array);
    }else{ 
        $rota = "Auto fill";
    }
    $comentario = $_POST['comentario']; 

    $con = new PDO('mysql:host=localhost;dbname=trabalho2e', 'root', ''); 

    $sth = $con->prepare("UPDATE formulario  SET nome = :nome, email = :email, idade = :idade,  
                        regiao = :regiao, plataforma = :plataforma, rota = :rota, comentario = :comentario WHERE id = :id"); 

    $sth->bindValue(':id',$_POST['id']); 
    $sth->bindValue(':nome',$nome);
    $sth->bindValue(':email',$email);
    $sth->bindValue(':idade',$idade);
    $sth->bindValue(':regiao',$regiao);
    $sth->bindValue(':plataforma',$plataforma);
    $sth->bindValue(':rota',$rota); 
    $sth->bindValue(':comentario',$comentario); 


    $sth->execute();
     
    echo"<script language='javascript' type='text/javascript'> 
           window.location.href='index.php'</script>";
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
                <div class="formulario"> <!--1-->
                    <label id="label-nome" for="nome">Nome: <br></label> 
                    <input type="text" name="nome"  placeholder="Digite seu nome" class="controle" required>  
                </div>  
                <div class="formulario"><!--2-->
                    <label id="label-email" for="email">E-mail: <br></label> 
                    <input type="email" name="email" placeholder="Digite seu email" class="controle" required>
                </div>   
                <div class="formulario"> <!--3-->   
                    <label id="label-idade" for="idade">Idade: <br></label> 
                    <input type="number"  name="idade" placeholder="Digite sua idade" class="controle" required>
                </div>   
                <div class="formulario"> <!--4--> 
                    <label id="label-regiao" for="regiao" >Sua região: <br></label> 
                    <select name="regiao" required>
                    <option disabled selected value>Escolha sua região </option>   
                    <option name="regiao" value="Norte">Norte</option>  
                    <option name="regiao" value="Nordeste">Nordeste</option> 
                    <option name="regiao" value="Centro-Oeste">Centro-Oeste</option> 
                    <option name="regiao" value="Sudeste">Sudeste</option> 
                    <option name="regiao" value="Sul">Sul</option>   
                    </select>
                </div>
                <div class="formulario"> <!--5-->  
                    <label id="label-plataforma" name="plataforma" required> Plataforma: <br></label> 
                    <label><input name="plataforma" value="Computador" type="radio" class="input-radio"/>League of Legends (Computador)<br></label> 
                    <label><input name="plataforma" value="Celular" type="radio" class="input-radio" />Wild Rift (Celular) <br></label>   
                    <label><input name="plataforma" value="Computador e Celular" type="radio" class="input-radio" />Ambas </label>  
                </div>
                <div class="formulario"> <!--6-->   
                    <label id="label-rota" name="posicoes"> Rota(s) em que joga: <br></label>  
                    <label> <input name="rota[]" type="checkbox" value="Topo" class="input-checkbox">Topo<br></label>   
                    <label> <input name="rota[]" type="checkbox" value="Jungle" class="input-checkbox">Jungle<br></label>  
                    <label> <input name="rota[]" type="checkbox" value="Meio" class="input-checkbox">Meio<br></label>   
                    <label> <input name="rota[]" type="checkbox" value="Atirador" class="input-checkbox">Atirador<br></label>    
                    <label> <input name="rota[]" type="checkbox" value="Suporte" class="input-checkbox">Suporte</label>    
                </div>
                <div class="formulario"> <!--7-->  
                    <label for="comentario" class="textarea">Comente sobre seu estilo de jogo: <br></label> 
                    <textarea id="comentario" name="comentario" class="textarea" style="resize: none" placeholder="Comentário" required></textarea>   
                </div>
                <div class="formulario"> <!--8-->   
                    <?php
                        echo "<input type='hidden' value=".$_POST['id']." name='id'></input>";
                    ?>
                    <button type="submit" name="enviarr" id="botao" class="submit"> Enviar </button> 
                </div>  
            </form>    
        </div>        
    </div>      
</body>
</html>
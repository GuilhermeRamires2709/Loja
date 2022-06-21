<?php
require_once "usuario.php";

 if(isset($_POST['opcao'])){
     if($_POST['opcao']=="Criar"){
        $newUser = new usuario($_POST['cpf'],$_POST['senha']);
        $newUser->setNome($_POST['nome']);
        $newUser->setSobrenome($_POST['sobrenome']);
        $newUser->setEndereço($_POST['endereço']);
        $resultado = $newUser->inserirusuario(); 
        if($resultado){
                session_start();
                header("location: usersession.php");
            } else {
                echo "Falha ao cadastrar.";
            }
        }
    }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Champion T-shirt</title>
</head>
<body>
    <div class='wrapper'>
    <form action='formUser.php' method="POST" enctype='multipart/form-data'>
    <?php
      echo "<h1>CADASTRAR</h1>";
      ?>
        <div class='input-group'>
            <label for='nome'>Nome:</label>
            <?php
                echo "<input type='text' id='nome' name='nome'>";
            ?>
        </div>
        <div class='input-group'>
            <label for='sobrenome'>Sobrenome:</label>
            <?php
                 echo "<input type='text' id='sobrenome' name='sobrenome'>";
                
            ?>
        </div>
        <div class='input-group'>
            <label for='cpf'>Cpf:</label>
            <?php
                  echo "<input type='text' id='cpf' name='cpf'>";

            ?>
        </div>
        <div class='input-group'>
            <label for='senha'>Senha:</label>
            <?php
                  echo "<input type='text' id='senha' name='senha'>";

            ?>
        </div>
        <div class='input-group'>
            <label for='endereço'>Endereço:</label>
            <?php
                  echo "<input type='text' id='endereço' name='endereço'>";

            ?>
        </div>

        <?php
           
             echo "<input type='submit' name='opcao' value='Criar'>";
             
        ?>
        
    </form>
    </div>
</body>
</html>
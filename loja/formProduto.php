<?php
require_once "produto.php";
include "protect.php";
 if(isset($_POST['opcao'])){
    if($_POST['opcao'] == "Inserir"){
        $novoProduto = new produto($_POST['nome'],$_POST['idLiga'],$_POST['estoque'],$_POST['preço']);
        $novoProduto->setFoto($_FILES['foto']);
        $resultado = $novoProduto->inserir(); 
        if($resultado){
            header("location: index.php");
        }else{
            echo "Inserção não realizada";
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
    <form action='formProduto.php' method="POST" enctype='multipart/form-data'>
    <?php
      echo "<h1>Novo Produto</h1>";
      ?>
        <div class='input-group'>
            <label for='nome'>Nome:</label>
            <?php
                echo "<input type='text' id='nome' name='nome'>";
            ?>
        </div>
        <div class='input-group'>
            <label for='foto'>Foto:</label>
            <?php
                 echo "<input type='file' id='foto' name='foto'>";
                
            ?>
        </div>
        <div class='input-group'>
            <label for='idLiga'>Id da Liga:</label>
            <?php
                  echo "<input type='text' id='idLiga' name='idLiga'>";

            ?>
        </div>
        <div class='input-group'>
            <label for='estoque'>Estoque:</label>
            <?php
                  echo "<input type='text' id='estoque' name='estoque'>";

            ?>
        </div>
        <div class='input-group'>
            <label for='preço'>Preço:</label>
            <?php
                  echo "<input type='text' id='preço' name='preço'>";

            ?>
        </div>

        <?php
           
             echo "<input type='submit' name='opcao' value='Inserir'>";
             
        ?>
        
    </form>
    <a href="index.php">Voltar</a>
    </div>
</body>
</html>

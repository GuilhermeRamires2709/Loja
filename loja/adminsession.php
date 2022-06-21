<?php
include "produto.php";
include "protect.php";
if(isset($_GET['opcao'])){
    $retorno = produto::apagar($_GET['idProduto']);
    
}

$produto=produto::listar($_SESSION['cpf']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type = "text/css" href="newstyle.css">
    <script src="https://kit.fontawesome.com/6fcb3c5241.js" crossorigin="anonymous"></script>
    <title>Champion T-Shirt</title>
</head>
<body>
    <header>    
    <img id="logo" src="upload/logo.jpeg" alt="">
    <div class="Inserir">
    <a href="formProduto.php"><input type='submit' name='inserir' value='Inserir Novo Produto'></a>
    </div>
    <div class='sair'>
    <a href="logout.php"><input type='submit' name='sair' value='Sair'></a>
    </div>
    </header>
        <h1 class="intro">Adquira já a sua segunda pele!</h1>
        <div class="ligas">
        <img id="la-liga" src="upload/banner/La liga.png" alt="">
        <img id="liga-nos" src="upload/banner/Liga NOS.png" alt=""> 
        <img id="eredivisie" src="upload/banner/eredivisie.png" alt="">
        <img id="ligue1" src="upload/banner/ligue1.png" alt="">
        <img id="serieA" src="upload/banner/seriea.png" alt="">
        <img id="premier" src="upload/banner/premier.png" alt="">
        <img id="br" src="upload/banner/br.png" alt="">
        <img id="bundesliga" src="upload/banner/bundesliga.png" alt="">    
        </div>    
       
        <div class="container-p">
        <?php 
            if($produto!=false){  
                        foreach($produto as $produtoAux){ 
                            echo "<div class='product1'>";
                            echo "<div class='fotoproduto'><img id='imagem'  src='fotos/".$produtoAux->getFoto()."'></div>";
                            echo "<div class='preco'>" .$produtoAux->getPreço()."</div>";
                            echo "<div class='nomeproduto'>" .$produtoAux->getNome()."</div>";
                            echo "<a href='formProduto.php?opcao=editar&idProduto=".$produtoAux->getIdProduto()."'><input type='submit'name='editar' value='Editar'></a>";
                            echo "<a href='adminsession.php?opcao=apagar&idProduto=".$produtoAux->getIdProduto()."'><input type='submit'name='apagar' value='Apagar'></a>"; 
                            echo"</div>";
                    }
                }
            ?>        
        </div>
        </body>
</html>
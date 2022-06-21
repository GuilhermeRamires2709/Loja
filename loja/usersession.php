<?php
include "produto.php";
include "protect.php";
if(isset($_POST['comprar'])){
    if($_POST['comprar'] == "Comprar"){
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

//AQUI COMEÇA O FILTRO LISTAGEM POR LIGA
if(isset($_POST['submit'])){
    if(isset($_POST['filtro']) != ""){
      $selecionado = $_POST['filtro'];
      if($selecionado=="laliga") {
        $produto = produto::listarLaliga();
      }else if($selecionado=="liganos") {
        $produto = produto::listarLiganos();
      }else if($selecionado=="ligue1") {
        $produto = produto::listarLigue1();
      }else if($selecionado=="serieA") {
        $produto = produto::listarSerieA();
      }else if($selecionado=="premier") {
        $produto = produto::listarPremier();
      }else if($selecionado=="br") {
        $produto = produto::listarBr();
      }else if($selecionado=="bundesliga") {
        $produto = produto::listarBundesliga();
      }else{
        $produto= produto::listar($_SESSION['cpf']);
      }
    }
    }else{
            $produto= produto::listar($_SESSION['cpf']);}

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
    <div class='sair'>
    <a href="logout.php"><input type='submit'name='sair' value='sair'></a>
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
       
        <form action="" method="POST">
      <select name='filtro'>
        <!--AQUI OCORRE A VERIFICAÇÃO DO FILTRO-->
      <option value="" disabled selected>FILTRO POR LIGA</option>
          <option value="laliga">LA LIGA</option>
          <option value="liganos">LIGA NOS</option>
          <option value="ligue1">LIGUE 1</option>
          <option value="serieA">SERIE A</option>
          <option value="premier">PREMIER LEAGUE</option>
          <option value="br">BRASILEIRÃO</option>
          <option value="bundesliga">BUNDESLIGA</option>
          <option value="limpar">LIMPAR FILTRO</option>
      </select>
      <input class='filtri' type="submit" name="submit" value="Filtrar">
      </form>
      
        <div class="container-p">
            <?php 
            if($produto!=false){  
                foreach($produto as $produtoAux){ 
                    echo "<div class='product1'>";
                    echo "<div class='fotoproduto'><img id='imagem'  src='fotos/".$produtoAux->getFoto()."'></div>";
                    echo "<div class='preco'>" .$produtoAux->getPreço()."</div>";
                    echo "<div class='nomeproduto'>" .$produtoAux->getNome()."</div>";
                        echo "<input type='submit' name='comprar' value='Comprar'>"; 
                        echo "</div>";
                    }
                }
            ?>            
        </div>
        <script>
            function teste(){
      console.log('fui clicado');
   }</script>
        </body>
</html>
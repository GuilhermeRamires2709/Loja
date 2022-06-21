<?php
require_once "usuario.php";
require_once "DB.php";

if(isset($_POST['entrar'])){
            $novousuario= new usuario($_POST['cpf'],$_POST['senha']);
            $resultado=$novousuario->autenticar();
            if($resultado){
                
                if(!isset($_SESSION)){
                    session_start();
                }
                if($_SESSION['cpf']=="1234567899"){
                    header("location: adminsession.php");
                }    
                else {
                    header("location: usersession.php");
                }
                }   else {
                    echo "Falha ao logar | CPF ou senha incorretos.";
                }
}
if(isset($_POST['cadastrar'])){
    header("location: formUser.php");
}        
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type = "text/css" href="stylelogin.css">
    <script src="https://kit.fontawesome.com/6fcb3c5241.js" crossorigin="anonymous"></script>
</head>
<body>        
        <main class="container">
            <h2>Acesse sua conta</h2>
            <form action="" method="POST">
                <div class="input-field">
                    <input type="text" name='cpf' id='cpf'
                        placeholder="Digite seu CPF">
                        <div class="underline"></div>
                </div>
                <div class="input-field">
                    <input type="text" name='senha' id='senha'
                        placeholder="Digite sua senha">
                        <div class="underline"></div>
                </div>
                <input type="submit" name="entrar" value="Entrar">
                <input type="submit" name="cadastrar" value="Cadastrar">
            </form>
            <div class="footer">
            <a href="forgetpassword.php"><span>Esqueceu sua senha?</span></a>
            </div>

        </main>
    </body>
</html>
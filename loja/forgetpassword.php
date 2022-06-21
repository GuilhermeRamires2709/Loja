<?php
require_once "usuario.php";

if(isset($_POST['entrar'])){
                $senha=substr(md5(time()), 0, 6);
                $retorno=usuario::editar($_POST['cpf'], $senha);
                if($retorno){
                     echo "Sua nova senha é $senha";
                    
                }
                 else {
                    echo "Falha ao logar | CPF ou senha incorretos.";
                }
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
                </div>
                <input type="submit" name="entrar" value="Entrar">
            </form>

        </main>
    </body>
</html>
<?php
    if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['cpf'])){
    die("Você não está logado.<p><a href=\"login.php\"> Entrar </a></p>");
}


?>    
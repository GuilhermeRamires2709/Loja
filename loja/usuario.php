<?php
require_once "DB.php";

Class usuario{
    private string $nome;
    private string $sobrenome;
    private string $endereço;
    public function __construct( private int $cpf, private string $senha){
    }

    public function getNome():string{
        return $this->nome;
    }
    public function getSobrenome():string{
        return $this->sobrenome;
    }
    public function getCpf():string{
        return $this->cpf;
    }
    public function getSenha():string{
        return $this->senha;
    }
    public function getEndereço():string{
        return $this->endereço;
    }
    public function setNome(string $nome){
        $this->nome = $nome;
    }
    public function setSobrenome(string $sobrenome){
        $this->sobrenome = $sobrenome;
    }
    public function setCpf(string $cpf){
        $this->cpf = $cpf;
    }
    public function setSenha(string $senha){
        $this->senha = $senha;
    }
    public function setEndereço(string $endereço){
        $this->endereço = $endereço;
    }
    
    public function inserirusuario(){
        $sql= "INSERT INTO usuario (nome, sobrenome, cpf, senha, endereço) VALUES ('$this->nome','$this->sobrenome', '$this->cpf', '$this->senha', '$this->endereço')";
        $db= new DB();
        $resultado = $db->manipular($sql);
        if($resultado==1){
            session_start();
            return true;    
        } else {
            return false;
        }
    }
    
    public function autenticar(){
        $sql= "SELECT * FROM usuario WHERE cpf='$this->cpf' and senha='$this->senha'";
        $db= new DB();
        $resultado = $db->consultar($sql);
        if ($resultado){
            session_start();
            $_SESSION['cpf']=$resultado[0]['cpf'];
            $_SESSION['senha']=$resultado[0]['senha'];
            return true;
        } else {
            return false;
        }

    }
    public static function editar($cpf, $senha){
        $sql="UPDATE usuario set senha = '$senha' WHERE cpf= $cpf";
        $db= new DB();
        $resultado=$db->manipular($sql);
        if($resultado==1){
            return true;
        } else{
            return false;
        }
    }
}
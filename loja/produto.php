<?php
require_once "DB.php";

class produto{

    private int $idProduto;
    private array|string $foto;

    public function __construct( private string $nome, private int $idLiga, private int $estoque, private float $preço){
    }
        public function getIdProduto():int{
            return $this->idProduto;

        }
        public function getNome():string{
            return $this->nome;

        }
        public function getEstoque():int{
            return $this->estoque;

        }
        public function getPreço():int{
            return $this->preço;

        }
        public function getFoto():string|array{
            return $this->foto;
        }
        public function getIdLiga():string{
            return $this->idLiga;
        }
        public function setIdProduto(int $id){
            $this->idProduto = $id;
        }
        public function setIdLiga(int $idLiga){
            $this->idLiga=$idLiga;
        }
        public function setNome(string $nome){
            $this->nome=$nome;
        }
        public function setFoto(array|string $foto){
            $this->foto=$foto;    
        }
        public function setPreço(int $preço){
            $this->preço=$preço;
        }
        public function setEstoque(int $estoque){
            $this->estoque=$estoque;
        }

        public function inserir(){
            $destino = uniqid().".".pathinfo($this->foto['name'])['extension'];
            move_uploaded_file($this->foto['tmp_name'],"fotos/".$destino);
            $sql = "INSERT INTO produto (nome,foto,idLiga,estoque,preço) VALUES ('$this->nome','$destino','$this->idLiga','$this->estoque','$this->preço')";
            $db = new DB();
            $resultado = $db->manipular($sql);
            if($resultado==1){
                return true;
            }else{
                return false;
                }
    }
        public static function listar(){
            $sql = "SELECT * FROM produto";
            $db = new DB();
            $resultado = $db->consultar($sql);
            if(is_array($resultado)){
                $produto = array();
                foreach($resultado as $produtoAux){
                    $novoProduto = new Produto($produtoAux['nome'],$produtoAux['idLiga'],$produtoAux['estoque'],$produtoAux['preço']);
                    $novoProduto->setIdProduto($produtoAux['idProduto']);
                    $novoProduto->setFoto($produtoAux['foto']);
                    $produto[] = $novoProduto;
            }
            return $produto;
        }else{
            return false;
        }
    }
    //AQUI COMEÇA A LISTAGEM POR LIGAS
    public static function listarLaliga(){
        $sql = "SELECT * FROM produto WHERE idliga=4";
        $db = new DB();
        $resultado = $db->consultar($sql);
        if(is_array($resultado)){
            $produto = array();
            foreach($resultado as $produtoAux){
                $novoProduto = new Produto($produtoAux['nome'],$produtoAux['idLiga'],$produtoAux['estoque'],$produtoAux['preço']);
                $novoProduto->setIdProduto($produtoAux['idProduto']);
                $novoProduto->setFoto($produtoAux['foto']);
                $produto[] = $novoProduto;
        }
        return $produto;
        } else {
            return false;
        }
    }

    public static function listarLiganos(){
        $sql = "SELECT * FROM produto WHERE idliga=7";
        $db = new DB();
        $resultado = $db->consultar($sql);
        if(is_array($resultado)){
            $produto = array();
            foreach($resultado as $produtoAux){
                $novoProduto = new Produto($produtoAux['nome'],$produtoAux['idLiga'],$produtoAux['estoque'],$produtoAux['preço']);
                $novoProduto->setIdProduto($produtoAux['idProduto']);
                $novoProduto->setFoto($produtoAux['foto']);
                $produto[] = $novoProduto;
        }
        return $produto;
        } else {
            return false;
        }
    }

    public static function listarLigue1(){
        $sql = "SELECT * FROM produto WHERE idliga=2";
        $db = new DB();
        $resultado = $db->consultar($sql);
        if(is_array($resultado)){
            $produto = array();
            foreach($resultado as $produtoAux){
                $novoProduto = new Produto($produtoAux['nome'],$produtoAux['idLiga'],$produtoAux['estoque'],$produtoAux['preço']);
                $novoProduto->setIdProduto($produtoAux['idProduto']);
                $novoProduto->setFoto($produtoAux['foto']);
                $produto[] = $novoProduto;
        }
        return $produto;
        } else {
            return false;
        }
    }
    public static function listarSerieA(){
        $sql = "SELECT * FROM produto WHERE idliga=3";
        $db = new DB();
        $resultado = $db->consultar($sql);
        if(is_array($resultado)){
            $produto = array();
            foreach($resultado as $produtoAux){
                $novoProduto = new Produto($produtoAux['nome'],$produtoAux['idLiga'],$produtoAux['estoque'],$produtoAux['preço']);
                $novoProduto->setIdProduto($produtoAux['idProduto']);
                $novoProduto->setFoto($produtoAux['foto']);
                $produto[] = $novoProduto;
        }
        return $produto;
        } else {
            return false;
        }
    }
    public static function listarPremier(){
        $sql = "SELECT * FROM produto WHERE idliga=5";
        $db = new DB();
        $resultado = $db->consultar($sql);
        if(is_array($resultado)){
            $produto = array();
            foreach($resultado as $produtoAux){
                $novoProduto = new Produto($produtoAux['nome'],$produtoAux['idLiga'],$produtoAux['estoque'],$produtoAux['preço']);
                $novoProduto->setIdProduto($produtoAux['idProduto']);
                $novoProduto->setFoto($produtoAux['foto']);
                $produto[] = $novoProduto;
        }
        return $produto;
        } else {
            return false;
        }
    }
    public static function listarBr(){
        $sql = "SELECT * FROM produto WHERE idliga=8";
        $db = new DB();
        $resultado = $db->consultar($sql);
        if(is_array($resultado)){
            $produto = array();
            foreach($resultado as $produtoAux){
                $novoProduto = new Produto($produtoAux['nome'],$produtoAux['idLiga'],$produtoAux['estoque'],$produtoAux['preço']);
                $novoProduto->setIdProduto($produtoAux['idProduto']);
                $novoProduto->setFoto($produtoAux['foto']);
                $produto[] = $novoProduto;
        }
        return $produto;
        } else {
            return false;
        }
    }
    public static function listarBundesliga(){
        $sql = "SELECT * FROM produto WHERE idliga=6";
        $db = new DB();
        $resultado = $db->consultar($sql);
        if(is_array($resultado)){
            $produto = array();
            foreach($resultado as $produtoAux){
                $novoProduto = new Produto($produtoAux['nome'],$produtoAux['idLiga'],$produtoAux['estoque'],$produtoAux['preço']);
                $novoProduto->setIdProduto($produtoAux['idProduto']);
                $novoProduto->setFoto($produtoAux['foto']);
                $produto[] = $novoProduto;
        }
        return $produto;
        } else {
            return false;
        }
    }
    public function editar(){
        $sql="UPDATE produto set nome=$this->nome, idLiga=$this->idLiga, foto = $this->foto, estoque=$this->estoque, preço=$this->preço WHERE idProduto=$this->idProduto and cpf=$this->cpf";
        $db= new DB();
        $resultado=$db->manipular($sql);
        if($resultado==1){
            return true;
        }
        else{
            return false;
        }
    }
    public static function apagar($idProduto){
            $sql = "DELETE FROM produto WHERE idProduto = $idProduto";
            $db = new DB();
            $resultado = $db->manipular($sql);
            if($resultado==1){
                return true;
            }else{
                return false;
            }
        }
        
    }

?>
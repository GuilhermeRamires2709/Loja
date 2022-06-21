<?php

class carrinho{

    
    public function __construct( private int $numeroDoPedido, private int $idDoProduto, private int $quantidade, private float $preço){
    }
        public function getNumeroDoPedido():int{
            return $this->numeroDoPedido;

        }
        public function getIdDoProduto():int{
            return $this->idDoProduto;

        }
        public function getQuantidade():int{
            return $this->quantidade;

        }
        public function getPreço():float{
            return $this->preço;

        }
        public function setNumeroDoPedido(int $numeroDoPedido){
            $this->numeroDoPedido=$numeroDoPedido;
        }
        public function setIdDoProduto(int $idDoProduto){
            $this->idDoProduto=$idDoProduto;
        }
        public function setQuantidade(int $quantidade){
            $this->quantidade=$quantidade;
        }
        public function setPreço(float $preço){
            $this->preço=$preço;
        }
        public function criar(){
            $sql = "INSERT INTO carrinho (numeroDoPedido,idDoProduto,quantidade,preço) VALUES ('$this->numeroDoPedido','$this->idDoProduto','$this->quantidade','$this->preço')";
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
<?php
include_once('ConexaoPDO.php');

class Produto {
    private $id = 0;
    private $tipo_id = 0;
    private $descricao = "";
    private $valor = 0;
    private $tabela = 'produto';

    function getProdutos(){
        $sql = "select * from ".$this->tabela." ORDER BY id DESC";
        return ConexaoPDO::getInstance()->query($sql);
    }

    function getProdutoById(){    
        $sql ="select * from " . $this->tabela . " where id = '".$this->limpaDados($_POST['id'])."'";
        return ConexaoPDO::getInstance()->query($sql);
    } 
    
    function insereProduto(){
        $this->tipo_id = $_POST['tipo_id'];
        $this->descricao = $_POST['descricao'];
        $this->valor = $_POST['valor'];       
        $sql = "INSERT INTO ".$this->tabela." (tipo_id,descricao,valor) VALUES ('".$this->limpaDados($this->tipo_id)."','".$this->limpaDados($this->descricao)."',".$this->limpaDados($this->valor).")";                
        return ConexaoPDO::getInstance()->exec($sql);
    }

    function updateProduto(){            
        $sql = "update ".$this->tabela." set tipo_id='".$this->limpaDados($_POST['tipo_id'])."',descricao='".$this->limpaDados($_POST['descricao'])."',valor='".$this->limpaDados($_POST['valor'])."' where id = '".$this->limpaDados($_POST['id'])."'";
        return ConexaoPDO::getInstance()->exec($sql);       
    }

    function deleteProduto(){    
        $sql ="delete from " . $this->tabela . " where id='".$this->limpaDados($_POST['id'])."'";
        return ConexaoPDO::getInstance()->exec($sql);       
    } 

    function limpaDados($valor){
        return pg_escape_string($valor);
    }
}

?>
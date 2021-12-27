<?php
include_once('conexao.php');

class Produto {
    private $id = 0;
    private $tipo_id = 0;
    private $descricao = "";
    private $valor = 0;
    private $tabela = 'produto';

    function getProdutos(){
        $sql = "select * from ".$this->tabela." ORDER BY id DESC";
        return pg_query($sql);
    }

    function getProdutoById(){    
        $sql ="select * from " . $this->tabela . " where id = '".$this->limpaDados($_POST['id'])."'";
        return pg_query($sql);
    } 
    
    function insereProduto(){
        $this->tipo_id = $_POST['tipo_id'];
        $this->descricao = $_POST['descricao'];
        $this->valor = $_POST['valor'];       
        $sql = "INSERT INTO ".$this->tabela." (tipo_id,descricao,valor) VALUES ('".$this->limpaDados($this->tipo_id)."','".$this->limpaDados($this->descricao)."',".$this->limpaDados($this->valor).")";        
        $result = pg_query($sql);
        return pg_affected_rows($result);
    }

    function updateProduto(){            
        $sql = "update ".$this->tabela." set tipo_id='".$this->limpaDados($_POST['tipo_id'])."',descricao='".$this->limpaDados($_POST['descricao'])."',valor='".$this->limpaDados($_POST['valor'])."' where id = '".$this->limpaDados($_POST['id'])."'";
        return pg_affected_rows(pg_query($sql));        
    }

    function deleteProduto(){    
        $sql ="delete from " . $this->tabela . " where id='".$this->limpaDados($_POST['id'])."'";
       return pg_affected_rows(pg_query($sql));       
    } 

    function limpaDados($valor){
        return pg_escape_string($valor);
    }
}

?>
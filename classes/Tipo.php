<?php
include_once('conexao.php');

class Tipo {
    private $id = 0;
    private $descricao = "";
    private $tabela = 'tipo';

    function getTipos(){
        $sql = "select * from ".$this->tabela." ORDER BY id DESC";
        return pg_query($sql);
    }

    function getTipoById(){    
        $sql ="select * from " . $this->tabela . " where id = '".$this->limpaDados($_POST['id'])."'";
        return pg_query($sql);
    } 
    
    function insereTipo(){
        $this->descricao = $_POST['descricao'];
        $this->valor = $_POST['valor'];
        $sql = "INSERT INTO ".$this->tabela." (descricao,valor) VALUES ('".$this->limpaDados($this->descricao)."',".$this->limpaDados($this->valor).")";        
        $result = pg_query($sql);
        return pg_affected_rows($result);
    }

    function updateTipo($data=array()){       
     
        $sql = "update ".$this->tabela." set descricao='".$this->limpaDados($_POST['descricao'])."',valor='".$this->limpaDados($_POST['valor'])."' where id = '".$this->limpaDados($_POST['id'])."'";
        return pg_affected_rows(pg_query($sql));        
    }

    function deleteTipo(){    
        $sql ="delete from " . $this->tabela . " where id='".$this->limpaDados($_POST['id'])."'";
       return pg_affected_rows(pg_query($sql));       
    } 

    function limpaDados($valor){
        return pg_escape_string($valor);
    }
}

?>
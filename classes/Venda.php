<?php
include_once('conexao.php');

class Venda {
    private $id = 0;
    private $data = "";
    private $valor = 0;
    private $tabela = 'public.venda';

    function getVendas(){
        $sql = "select * from ".$this->tabela." ORDER BY id DESC";
        return pg_query($sql);
    }

    function getVendaById(){    
        $sql ="select * from " . $this->tabela . " where id = '".$this->limpaDados($_POST['id'])."'";
        return pg_query($sql);
    } 
    
    function insereVenda(){    
        $this->data = date("Y-m-d H:i:s");           
        $this->qtde = $_POST['valor'];       
        $sql = "INSERT INTO ".$this->tabela." (data,valor) VALUES ('".$this->limpaDados($this->data)."','".$this->limpaDados($this->valor)."')";        
        $result = pg_query($sql);
        return pg_affected_rows($result);
    }

    function updateVenda($data=array()){       
     
        $sql = "update ".$this->tabela." set data='".$this->limpaDados($_POST['data'])."',valor='".$this->limpaDados($_POST['valor'])."' where id = '".$this->limpaDados($_POST['id'])."'";
        return pg_affected_rows(pg_query($sql));        
    }

    function deleteVenda(){    
        $sql ="delete from " . $this->tabela . " where id='".$this->limpaDados($_POST['id'])."'";
       return pg_affected_rows(pg_query($sql));       
    } 

    function limpaDados($valor){
        return pg_escape_string($valor);
    }
}

?>
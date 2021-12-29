<?php
include_once('ConexaoPDO.php');

class Venda {
    private $id = 0;
    private $data = "";
    private $valor = 0;
    private $tabela = 'public.venda';

    function getVendas(){
        $sql = "select * from ".$this->tabela." ORDER BY id DESC";
        return ConexaoPDO::getInstance()->query($sql);
    }

    function getVendaById(){    
        $sql ="select * from " . $this->tabela . " where id = '".$this->limpaDados($_POST['id'])."'";
        return ConexaoPDO::getInstance()->query($sql);
    } 
    
    function insereVenda(){    
        $this->data = date("Y-m-d H:i:s");           
        $this->qtde = $_POST['valor'];       
        $sql = "INSERT INTO ".$this->tabela." (data,valor) VALUES ('".$this->limpaDados($this->data)."','".$this->limpaDados($this->valor)."')";        
        return ConexaoPDO::getInstance()->exec($sql);
    }

    function updateVenda($data=array()){       
     
        $sql = "update ".$this->tabela." set data='".$this->limpaDados($_POST['data'])."',valor='".$this->limpaDados($_POST['valor'])."' where id = '".$this->limpaDados($_POST['id'])."'";
        return ConexaoPDO::getInstance()->exec($sql);       
    }

    function deleteVenda(){    
        $sql ="delete from " . $this->tabela . " where id='".$this->limpaDados($_POST['id'])."'";
        return ConexaoPDO::getInstance()->exec($sql);  
    } 

    function limpaDados($valor){
        return pg_escape_string($valor);
    }
}

?>
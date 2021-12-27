<?php
include_once('conexao.php');

class Item {
    private $id = 0;
    private $venda_id = 0;
    private $produto_id = 0;
    private $qtde = 0;
    private $tabela = 'item_venda';

    function getItens(){
        $sql = "select item_venda.id, tipo.valor valor_tipo,item_venda.venda_id,item_venda.qtde,produto.descricao,produto.valor from ".$this->tabela." INNER JOIN produto ON item_venda.produto_id = produto.id INNER JOIN tipo ON produto.tipo_id = tipo.id ORDER BY item_venda.id DESC";
        return pg_query($sql);
    }

    function getItemById(){    
        $sql ="select * from " . $this->tabela . " where id = '".$this->limpaDados($_POST['id'])."'";
        return pg_query($sql);
    } 
    
    function insereItem(){
        $sql = pg_query("select * from venda ORDER BY id DESC");
        if(pg_affected_rows($sql) == 0){
            $sql = "INSERT INTO venda (data,valor) VALUES ('".$this->limpaDados('2021-12-23 21:07:00')."','".$this->limpaDados(0)."')";                
            $venda = pg_fetch_object(pg_query($sql));            
        }
        $sql = "select * from venda ORDER BY id DESC";
        $venda = pg_fetch_object(pg_query($sql));
        $this->venda_id = $venda->id;    
        $this->produto_id = $_POST['produto_id'];
        $this->qtde = $_POST['qtde'];   
        $sql = "INSERT INTO ".$this->tabela." (venda_id,produto_id,qtde) VALUES ('".$this->limpaDados($this->venda_id)."','".$this->limpaDados($this->produto_id)."',".$this->limpaDados($this->qtde).")";        
        $result = pg_query($sql);
        return pg_affected_rows($result);
    }

    function updateItem($data=array()){       
     
        $sql = "update ".$this->tabela." set venda_id='".$this->limpaDados($_POST['venda_id'])."',produto_id='".$this->limpaDados($_POST['produto_id'])."',qtde='".$this->limpaDados($_POST['qtde'])."' where id = '".$this->limpaDados($_POST['id'])."'";
        return pg_affected_rows(pg_query($sql));        
    }

    function deleteItem(){    
        $sql ="delete from " . $this->tabela . " where id='".$this->limpaDados($_POST['id'])."'";       
       return pg_affected_rows(pg_query($sql));       
    } 

    function limpaDados($valor){
        return pg_escape_string($valor);
    }
}

?>
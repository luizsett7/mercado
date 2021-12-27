<?php 
include('header.php');
$tipos = $objTipo->getTipos();
$produtos = $obj->getProdutos();
$itens = $objItem->getItens();
if(isset($_POST['submit']) and !empty($_POST['submit'])){
  $ret_val = $objItem->insereItem();
  if($ret_val==1){ ?>
      <script type="text/javascript">
      Swal.fire(
        'Parabéns!',
        'Item salvo com sucesso!',
        'success'
      ).then((result) => {
        window.location.href = "caixa.php";
      });
      </script>
<?php
  }
}
  if(isset($_POST['delete'])){
    $ret_val = $objItem->deleteItem();   
    if($ret_val == 1){      
      echo "<script>alert('Registro deletado com sucesso'); window.location.reload(); </script>";
    }
  }

?>
<div class="container-fluid bg-3 text-center">    
  <h3>Mercado - Caixa</h3>
  <a href="/caixa.php" class="btn btn-primary pull-right" style='margin-top:-30px'><span class="glyphicon glyphicon-eye-open"></span> Visualizar Caixa</a>
  <br>
  
  <div class="panel panel-primary">
        <div class="panel-heading">Mercado - Inserir Produtos</div>
            <form class="form-horizontal" method="post">
            <div class="panel-body">                 
                <div class="form-group">
               <label class="control-label col-sm-2">Produto:<span style='color:red'>*</span></label>
               <div class="col-sm-5">               
                <select name="produto_id" id="produto_id" class="form-control">
                <?php while($produto = pg_fetch_object($produtos)): ?>
                    <option value="<?=$produto->id?>"><?=$produto->descricao?></option>
                <?php endwhile; ?>
                </select> 
               </div>
               <div class="form-group">
               <label class="control-label col-sm-1">Quantidade:<span style='color:red'>*</span></label>
               <div class="col-sm-2">
                  <input class="form-control" type="text" name="qtde" required>
               </div>
            </div>
             </div>                          
            <div class="form-group">
               <label class="control-label col-sm-2">  </label>
               <div class="col-sm-5">
                  <input type="submit" class="btn btn-primary" name="submit"  value="Adicionar">
               </div>
            </div> 
        </div>      
</form>
<table class="table table-bordered table-striped">
    <thead>
      <tr class="active">
            <th>#ID</th>  
            <th>Descrição</th>       
            <th>Valor</th>   
            <th>Quantidade</th>
            <th>Imposto</th>
            <th>Subtotal</th>            
            <th>Ações<th>  
      </tr>
    </thead>
    <tbody>
<?php 
      $total_venda = 0;
      $total_imposto = 0;
      while($item = pg_fetch_object($itens)): ?>   
      <tr align="left">        
        <td><?=$item->venda_id?></td>
        <td><?=$item->descricao?></td>
        <td>R$ <?=number_format($item->valor,2,",",".")?></td>  
        <th><?=number_format($item->qtde,2,",",".")?></th>
        <th>R$ <?=number_format($item->valor_tipo,2,",",".")?></th>
        <th>R$ <?=number_format($item->valor*$item->qtde,2,",",".")?></th>               
        <th>
            <form method="post">                  
                <input type="submit" onClick="return confirm('Confirme a exclusão');" class="btn btn-danger" name="delete" value="Deletar">
                <input type="hidden" value="<?=$item->id?>" name="id">
            </form>
        </th>
      </tr>      
    <?php 
      $total_venda += $item->valor*$item->qtde;
      $total_imposto += $item->valor_tipo;
      endwhile; 
    ?> 
    <tr align="left">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>R$ <?=number_format($total_imposto,2,",",".")?></strong></td>
        <td><strong>R$ <?=number_format($total_venda,2,",",".")?></strong></td>
        <td><strong>Total Geral: R$<?=number_format($total_venda + $total_imposto,2,",",".")?></strong></td>
      </tr>
    </tbody>
  </table>
</div>
</div>  
 <?php include('footer.php');?>

<?php 
include('../header.php');
$produtos = $obj->getProdutos();
$sn=1;
if(isset($_POST['update'])){
    $produto = $obj->getProdutoById();
    $_SESSION['produto'] = $produto->fetchObject();
    header('location:edit.php');
}
if(isset($_POST['delete'])){
   $ret_val = $obj->deleteProduto();   
   if($ret_val == 1){ ?>   
      <script type="text/javascript">
      Swal.fire(
        'Parabéns!',
        'Item excluído com sucesso!',
        'success'
      ).then((result) => {
        window.location.href = "produtos.php";
      });
      </script>
<?php
  }
}
?>
<div class="container-fluid bg-3 text-center">    
  <h3>Mercado</h3>
  <a href="insert.php" class="btn btn-primary pull-right" style='margin-top:-30px'><span class="glyphicon glyphicon-plus-sign"></span> Adicionar Produto</a>
  <br>
  
  <div class="panel panel-primary">
        <div class="panel-heading">Produtos</div>
             
            <div class="panel-body">
            <table class="table table-bordered table-striped">
    <thead>
      <tr class="active">
            <th>#ID</th>  
            <th>Descrição</th>       
            <th>Valor</th>   
            <th>Ações<th>  
      </tr>
    </thead>
    <tbody>
    <?php while($produto = $produtos->fetchObject()): ?>   
      <tr align="left">        
        <td><?=$produto->id?></td>
        <td><?=$produto->descricao?></td>
        <td><?=number_format($produto->valor,2,",",".")?></td>        
        <td>
            <form method="post">
                <input type="submit" class="btn btn-success" name= "update" value="Editar">   
                <!--<input type="submit" onClick="return confirm('Confirme a exclusão');" class="btn btn-danger" name="delete" value="Deletar">-->
                <input type="hidden" value="<?=$produto->id?>" name="id">
            </form>
        </td>
      </tr>
    <?php endwhile; ?>   
    </tbody>
  </table>
</div>
 
</div>
</div>  
<?php include('../footer.php');?>
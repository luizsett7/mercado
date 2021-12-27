<?php 
include('../header.php');
$tipos = $objTipo->getTipos();
$sn=1;
if(isset($_POST['update'])){
    $tipo = $objTipo->getTipoById();
    $_SESSION['tipo'] = pg_fetch_object($tipo);
    header('location:edit.php');
}
if(isset($_POST['delete'])){
   $ret_val = $objTipo->deleteTipo();   
   if($ret_val == 1){      
      echo "<script>alert('Registro deletado com sucesso'); window.location.reload(); </script>";
  }
}
?>
<div class="container-fluid bg-3 text-center">    
  <h3>Mercado</h3>
  <a href="insert.php" class="btn btn-primary pull-right" style='margin-top:-30px'><span class="glyphicon glyphicon-plus-sign"></span> Adicionar Tipo</a>
  <br>
  
  <div class="panel panel-primary">
        <div class="panel-heading">Tipos de Produtos</div>
             
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
    <?php while($tipo = pg_fetch_object($tipos)): ?>   
      <tr align="left">        
        <td><?=$tipo->id?></td>
        <td><?=$tipo->descricao?></td>
        <td><?=number_format($tipo->valor,2,",",".")?></td>        
        <td>
            <form method="post">
                <input type="submit" class="btn btn-success" name= "update" value="Editar">   
                <input type="submit" onClick="return confirm('Confirme a exclusão');" class="btn btn-danger" name="delete" value="Deletar">
                <input type="hidden" value="<?=$tipo->id?>" name="id">
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
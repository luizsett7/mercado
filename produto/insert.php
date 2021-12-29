<?php 
include('../header.php');
$tipos = $objTipo->getTipos();
if(isset($_POST['submit']) and !empty($_POST['submit'])){
$ret_val = $obj->insereProduto();
if($ret_val==1){
    echo '<script type="text/javascript">'; 
    echo 'alert("Produto salvo com sucesso");'; 
    echo 'window.location.href = "produtos.php";';
    echo '</script>';
}
}
?>
<div class="container-fluid bg-3 text-center">    
  <h3>Mercado - Inserir Produtos</h3>
  <a href="produtos.php" class="btn btn-primary pull-right" style='margin-top:-30px'><span class="glyphicon glyphicon-eye-open"></span> Visualizar Produtos</a>
  <br>
  
  <div class="panel panel-primary">
        <div class="panel-heading">Mercado - Inserir Produtos</div>
            <form class="form-horizontal" method="post">
            <div class="panel-body">                 
                <div class="form-group">
               <label class="control-label col-sm-2">Tipo:<span style='color:red'>*</span></label>
               <div class="col-sm-5">               
                <select name="tipo_id" id="tipo_id" class="form-control">
                <?php while($tipo = $tipos->fetchObject()): ?>
                    <option value="<?=$tipo->id?>"><?=$tipo->descricao?></option>
                <?php endwhile; ?>
                </select> 
               </div>
             </div>
             <div class="form-group">
               <label class="control-label col-sm-2">Descrição:<span style='color:red'>*</span></label>
               <div class="col-sm-5">
                  <input class="form-control" type="text" name="descricao" required>
               </div>
             </div>  
             <div class="form-group">
               <label class="control-label col-sm-2">Valor:<span style='color:red'>*</span></label>
               <div class="col-sm-5">
                  <input class="form-control" type="text" name="valor" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">  </label>
               <div class="col-sm-5">
                  <input type="submit" class="btn btn-primary" name="submit"  value="Cadastrar">
               </div>
            </div> 
        </div>      
</form>
</div>
</div>  
 <?php include('../footer.php');?>

<?php 
include('../header.php');
$tipo = $_SESSION['tipo'];
if(isset($_POST['update']) and !empty($_POST['update'])){
$ret_val = $objTipo->updateTipo();
if($ret_val==1){
    echo '<script type="text/javascript">'; 
    echo 'alert("Tipo atualizado com sucesso");'; 
    echo 'window.location.href = "tipos.php";';
    echo '</script>';
}
}
?>
<div class="container-fluid bg-3 text-center">    
  <h3>Mercado</h3>
  <a href="/index.php" class="btn btn-primary pull-right" style='margin-top:-30px'><span class="glyphicon glyphicon-step-backward"></span>Voltar</a>
  <br>  
  <div class="panel panel-primary">
        <div class="panel-heading">Tipos - Editar</div>
            <form class="form-horizontal" method="post">
            <div class="panel-body">             
             <div class="form-group">
               <label class="control-label col-sm-2">Descrição:<span style='color:red'>*</span></label>
               <div class="col-sm-5">
                  <input class="form-control" value="<?=$tipo->descricao?>" type="text" name="descricao" required>
               </div>
            </div>
             <div class="form-group">
               <label class="control-label col-sm-2">Valor:<span style='color:red'>*</span></label>
               <div class="col-sm-5">
                  <input class="form-control" value="<?=$tipo->valor?>" type="text" name="valor" required>
               </div>
            </div>            
               <input type="hidden" value="<?=$tipo->id?>" name="id">
            </div>
             <div class="form-group">
               <label class="control-label col-sm-2">  </label>
               <div class="col-sm-5">
                 <input type="submit" class="btn btn-success" name="update" value="Atualizar">                    
                </div>
            </div> 
        </div>      
</form>
</div>
</div>  
 <?php include('../footer.php');?>
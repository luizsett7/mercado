<?php 
include('header.php');
if(isset($_POST['submit']) and !empty($_POST['submit'])){
$ret_val = $objTipo->insereTipo();
if($ret_val==1){
    echo '<script type="text/javascript">'; 
    echo 'alert("Tipo salvo com sucesso");'; 
    echo 'window.location.href = "tipos.php";';
    echo '</script>';
}
}
?>
<div class="container-fluid bg-3 text-center">    
  <h3>Mercado - Inserir Tipo de Produtos</h3>
  <a href="tipos.php" class="btn btn-primary pull-right" style='margin-top:-30px'><span class="glyphicon glyphicon-eye-open"></span> Visualizar Tipos</a>
  <br>
  
  <div class="panel panel-primary">
        <div class="panel-heading">Mercado - Inserir Tipo de Produtos</div>
            <form class="form-horizontal" method="post">
            <div class="panel-body">                 
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
 <?php include('footer.php');?>

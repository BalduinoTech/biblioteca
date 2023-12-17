 <section class="content">
      <div class="container-fluid">
      <div class="row">
      <section class="col-lg-12 connectedSortable">

<?php
if (isset($_SESSION['alerta'])) {
  print($_SESSION['alerta']);
  unset($_SESSION['alerta']);
}

?>
<div class="card card-info">
<div class="card-header" style="background-color: #4b545c;">
<h3 class="card-title">Registar Emprestimo</h3>
</div>
<div class="card-body">
<form action="../controlo/controlo_emprestimo.php?url=cadastrar" method="post">



<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Utente</label>
<input class="form-control" name="utente" required="">

</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Telefone</label>

<div class="input-group my-colorpicker2">
<input type="text" class="form-control" required=""  name="telefone">
</div>

</div>
</div>

</div>

                
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Endereço</label>

<div class="input-group my-colorpicker2">
<input type="text" class="form-control" required=""  name="endereco">
</div>

</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Livro</label>

<div class="input-group my-colorpicker2">
<select class="form-control" name="livro" required="">


<option value="">selecione...</option>
<?php  
$le=$pdo->prepare(" select * from livros");
$le->execute();
while ($leitor=$le->fetch(PDO::FETCH_OBJ)) {

?>

<option value="<?=$leitor->IDLivro;?>"><?php echo$leitor->titulo;?></option>
<?php  

}

?>
</select>
</div>

</div>
</div>


</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Data Emprestimo</label>

<div class="input-group my-colorpicker2">
<input type="date" class="form-control" required="" min="<?php echo date("Y-m-d");?>" name="datainicio">
</div>

</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Devolução Prevista</label>

<div class="input-group my-colorpicker2">
<input type="date" class="form-control" required="" min="<?php echo date("Y-m-d");?>" name="datafinal">
</div>

</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Estado do Livro</label>

<div class="input-group my-colorpicker2">
<input type="text" class="form-control" required=""  name="estado">
</div>

</div>
</div>

</div>



            
<div class="card-footer">
<center>
<button type="submit" class="btn btn-dark col-lg-8">Registrar</button>
</center>
</div>
</form>
</div>
</div>
</section>
</div>
</div>
</section>


      
           
    </section>

    <?php


?>
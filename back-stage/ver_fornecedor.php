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



<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fornecedores Cadastrados </h3>
                <div class="card-tools">
                <form action="?url=ver_fornecedor" method="post">
                  <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="nome" class="form-control float-right" placeholder="procurar">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome</th>
                      <th>Contacto</th>
                      <th>Endereço</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                       <?php 



$pagina=(isset($_GET['pag']))? $_GET['pag']:1;
$q="select * from Fornecedores";
$sel=$pdo->prepare($q);
$sel->execute();
//contar o total de produtos
$total_resisto=$sel->rowCount();
//quantidade de produto por paginas
$quantidade_pag=10;
$numpag=ceil($total_resisto/$quantidade_pag);
//calcuclando o inicio da visualização
$inicio=($quantidade_pag*$pagina)-$quantidade_pag;

$nome= isset($_POST['nome']) ? $_POST['nome']:"";
$i=0;

$e="select * from Fornecedores where Nome like'%$nome%' limit {$inicio},".$quantidade_pag;
                    $q=$pdo->prepare($e);
                    $q->execute();
                    while ($dados=$q->fetch(PDO::FETCH_OBJ)) {
                   
                    ?> 
                    <tr>
                      <td><?php echo$i=$i+1;?></td>

                      <td><?php echo $dados->Nome;?></td>
                    
                      <td><?php echo $dados->Contato;?></td>
                      <td><?php echo $dados->Endereco;?></td>

                       <td><a href="?url=editar_fornecedor&cod=<?=$dados->IDFornecedor?>"> <button class="btn btn-primary"><i class="fa fa-edit"></i></button> </a></td>
                      <td><a onclick="return confirm('Deseja eliminar ?')" href="../controlo/controlo_fornecedor.php?url=eliminar&cod=<?=$dados->IDFornecedor?>"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button> </a></td>

                    </tr>
                        <?php
                 }
                   ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

 <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php 
//pagina anterior e posterior 
$pag_anterior=$pagina-1;
$pag_posterior=$pagina+1;

?>
<li  class="page-item">
<?php  if($pag_anterior!=0){?>

<a class="page-link" href=" index.php?url=ver_fornecedor&pag=<?php echo$pag_anterior;?>">&laquo;</a>
<?php  }else{?>
<a class="page-link" href="#">&laquo;</a>
<?php } ?>
</li>



<?php
//paginação
for($i=1; $i<$numpag+1; $i++){ 
if(isset($_GET['pag'])){
  $val=$_GET['pag'];
}else{$val=1;}
if($i==$val){
  ?>


<li class=" page-item active"><a class="page-link" href="index.php?url=ver_fornecedor&pag=<?php echo$i;?>" ><?php echo$i; ?></a></li>
<?php }else{?>
<li class="page-item"><a class="page-link" href="index.php?url=ver_fornecedor&pag=<?php echo$i;?>" ><?php echo$i; ?></a></li>
<?php }}?>
<li class="page-item">
<?php  if($pag_posterior<=$numpag){?>
<a class="page-link" href="?url=ver_fornecedor&pag=<?php echo$pag_posterior;?>">&raquo;</a>
<?php  }else{?>
<a class="page-link" href="#">&raquo;</a>
<?php } ?>



  </li>





                </ul>
              </div>


            </div>
            <!-- /.card -->
          </div>
        </div>
      </section>
    </div>
  </div>
</section>
    
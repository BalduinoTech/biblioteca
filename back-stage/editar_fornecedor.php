 <section class="content">
      <div class="container-fluid">
      <div class="row">
      <section class="col-lg-12 connectedSortable">

<?php
@$id=$_GET['cod'];
$f=$pdo->prepare("select * from Fornecedores  where IDFornecedor=$id");
$f->execute();
$fornecedor=$f->fetch(PDO::FETCH_ASSOC);

?>
<div class="card card-info">
              <div class="card-header" style="background-color: #4b545c;">
                <h3 class="card-title">Editar Fornecedores</h3>
              </div>
              <div class="card-body">
                <form action="../controlo/controlo_fornecedor.php?url=editar" method="post">
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" required="" name="nome" class="form-control" value="<?=$fornecedor['Nome']?>">
                </div>
                <!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                  <label>Contacto</label>

                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control" required="" name="contacto" value="<?=$fornecedor['Contato']?>">
                  </div>
                  <!-- /.input group -->
                </div>

                 <div class="form-group">
                  <label>Endereço</label>

                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control" required="" name="endereco" value="<?=$fornecedor['Endereco']?>">
                  </div>
                  <input type="hidden" name="id" value="<?=$fornecedor['IDFornecedor']?>">
                </div>
                <!-- /.form group -->

            
             <div class="card-footer">
                  <button type="submit" class="btn btn-info">Gravar</button>
               
                </div>
                </form>
              </div>
            </div>
</section>
</div>
</div>
</section>


      
           
    </section>
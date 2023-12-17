<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Livros</span>
                      
                <span class="info-box-number">
             <?php 
             $livro=$pdo->prepare("select * from livros");
             $livro->execute();
             echo $livro->rowCount()
             ?>
                
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Emprestimos</span>
            
        
                <span class="info-box-number"><?php 
             $emprestimo=$pdo->prepare("select * from emprestimos");
             $emprestimo->execute();
             echo $emprestimo->rowCount()
             ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Livros PDF</span>
          
                <span class="info-box-number"><?php 
             $arquivos=$pdo->prepare("select * from arquivo");
             $arquivos->execute();
             echo $arquivos->rowCount()
             ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Fornecedores</span>
                                                 
                <span class="info-box-number"><?php 
             $fornecedores=$pdo->prepare("select * from fornecedores");
             $fornecedores->execute();
             echo $fornecedores->rowCount()
             ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            
            <!-- /.card -->
            <div class="row">
              <div class="col-md-6">
                <!-- DIRECT CHAT -->
                
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->

              <div class="col-md-6">
                <!-- USERS LIST -->
                
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
        
          </div>
    







          <div class="col-md-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Funcionários</span>
        
                <span class="info-box-number">      <?php
         $n=$pdo->prepare("select * from funcionarios");
          $n->execute();
          echo$n->rowCount();
    
          ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
           
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fa fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sugestões</span>
                     
                <span class="info-box-number"><?php
         $n=$pdo->prepare("select * from sugestoes");
          $n->execute();
          echo$n->rowCount();
       
          ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
           
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fa fa-download"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Downloads</span>
                <span class="info-box-number"><?php
          $n=$pdo->prepare("select sum(download) as download from arquivo");
          $n->execute();
          $do=$n->fetch(PDO::FETCH_ASSOC);
          echo $do['download'];
          ?></span>
              </div>
          
            </div>
            
            
            <!-- /.card -->
          </div>












          <div class="col-md-6">
            

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Emprestimos Recentes</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                     <?php
          $not=$pdo->prepare("select * from emprestimos e inner join livros l on(e.IDLivro=l.IDLivro) limit 4");
          $not->execute();
          $cont=$not->rowCount();
          while ($no=$not->fetch(PDO::FETCH_OBJ)) {
        
          ?>
                  <li class="item">
                    <div class="product-img">
                      <img src="../img/<?php echo $no->file;?>"  class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?php echo $no->utente?>
                        <span class="badge badge-warning float-right"></span></a>
                      <span class="product-description">
                        <?php echo $no->titulo;?>
               
                      </span>
                      <a href="?url=painel&cancelar&cod=<?//=$no->idpedidos;?>"> <span class="badge badge-warning float-right">X</span></a>
                    </div>
                  </li>
               
                <?php
           }
        ?>
              
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="?url=ver_pedido" class="uppercase">Ver mais</a>
              </div>
              <!-- /.card-footer -->
            </div>


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>

    <?php
    if(isset($_GET['cancelar'])){

      $id=$_GET['cod'];

      $atl=$pdo->prepare("update pedidos set estado_pedido='visto' where idpedidos=$id");
      if($atl->execute()){
echo'<script>

window.location.href = "?url=painel";

</script>';

      }else{

       echo'<script>
alert("Erro");
window.location.href = "?url=painel";

</script>';


      }


    }






    ?>


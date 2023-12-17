 <section class="content">
      <div class="container-fluid">
      <div class="row">
      <section class="col-lg-12 connectedSortable">

<?php
if(isset($_SESSION['alerta'])){
  print($_SESSION['alerta']);
  unset($_SESSION['alerta']);
}

?>
<div class="card card-info">
              <div class="card-header" style="background-color: #4b545c;">
                <h3 class="card-title">Cadastrar Livros</h3>
              </div>
              <div class="card-body">
                <form action="../controlo/controlo_livro.php?url=cadastrar" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Titulo</label>
                  <input type="text" placeholder="Digite o titulo do livro" required="" name="titulo" class="form-control">
                </div>
                <!-- /.form group -->

               <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Autor</label>

                  <div class="input-group my-colorpicker2">
                    <input type="text" placeholder="Digite o Autor" class="form-control" required="" name="autor">
                  </div>
                  <!-- /.input group -->
                </div>
                </div><div class="col-md-6">
                <div class="form-group">
                  <label>Estado</label>

                  <div class="input-group my-colorpicker2">
                   

              <select id="estadoLivro" name="estado" class="form-control">
        <option>Novo</option>
        <option>Usado - Como Novo</option>
        <option>Usado - Em Bom Estado</option>
        <option>Usado - Com Marcas de Uso</option>
        <option>Desgastado</option>
    </select>
                  </div>
                  <!-- /.input group -->
                </div>
                </div>
                </div>
                <!-- /.form group -->
<div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Ano de Lancamento</label>
                <input type="text" class="form-control" name="ano" required="">

                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Editora</label>
                 <input type="text" placeholder="Digite a editora" class="form-control" name="editora" required="">

                </div>
             
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Categoria</label>
               <select class="form-control" name="categoria" required="">
                  <optgroup label="Ficção">
            <option>Romance</option>
            <option>Mistério</option>
            <option>Ficção Científica</option>
            <option>Fantasia</option>
            <option>Aventura</option>
            <option>Horror</option>
        </optgroup>
        <optgroup label="Não Ficção">
            <option>Biografia</option>
            <option>História</option>
            <option>Ciência</option>
            <option>Autodesenvolvimento</option>
            <option>Política</option>
            <option>Filosofia</option>
        </optgroup>
        <optgroup label="Literatura Clássica">
            <option>Shakespeare</option>
            <option>Jane Austen</option>
            <!-- Adicione mais autores ou obras clássicas conforme necessário -->
        </optgroup>
        <optgroup label="Poesia">
            <option>Poesia Contemporânea</option>
            <option>Poesia Clássica</option>
        </optgroup>
        <optgroup label="Religião e Espiritualidade">
            <option>Cristianismo</option>
            <option>Islamismo</option>
            <option>Budismo</option>
            <option>Hinduísmo</option>
            <option>Espiritualidade</option>
        </optgroup>
        <optgroup label="Culinária">
            <option>Receitas</option>
            <option>Nutrição</option>
            <option>Culinária Internacional</option>
        </optgroup>
        <optgroup label="Negócios e Economia">
            <option>Empreendedorismo</option>
            <option>Finanças Pessoais</option>
            <option>Economia</option>
        </optgroup>
        <optgroup label="Tecnologia e Ciência da Computação">
            <option>Programação</option>
            <option>Desenvolvimento de Software</option>
            <option>Ciência da Computação</option>
        </optgroup>
        <optgroup label="Saúde e Bem-Estar">
            <option>Fitness</option>
            <option>Nutrição</option>
            <option>Saúde Mental</option>
        </optgroup>
        <optgroup label="Artes e Fotografia">
            <option>Pintura</option>
            <option>Fotografia</option>
            <option>Música</option>
        </optgroup>
               </select>

                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Prateleira</label>
                 <input type="text" placeholder="Digite a Prateleira" class="form-control" name="prateleira" required="">

                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>

             <div class="form-group">
                    <label for="exampleInputFile">Imagem</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file" required="" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Selecione</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Arquivo</span>
                      </div>
                    </div>
                  </div>
             <div class="card-footer">
                  <button type="submit" class="btn btn-info">Registrar</button>
               
                </div>
                </form>
              </div>
            </div>
</section>
</div>
</div>
</section>


      
           
    </section>
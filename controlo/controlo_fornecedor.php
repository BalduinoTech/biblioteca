<?php

session_start();// iniciamos a sessão para passar informações entre paginas
require_once'../conexao/conexao.php';
require_once'../modelo/fornecedor.php';

$pdo=conectar();


if(isset($_GET['url']) && $_GET['url']!=null){//verifica se existe um url 

    $url=$_GET['url'];// caso existir ela captura
    
if($url=="cadastrar"){ 

    $nome=$_POST['nome'];
    $endereco=$_POST['endereco'];
    $contacto=$_POST['contacto'];
  
    $q=" select * from Fornecedores where nome='$nome' and Contato='$contacto'";// verifica se esse usuário já existe na base de dados
    $busca=$pdo->prepare($q);
    $busca->execute();

    $contador=$busca->rowCount();
    if($contador <=0){// se não existir nenhum usuario ele vai cadastrar

    $cadastrar=FORNECEDOR::salvar($nome,$endereco,$contacto);//recebe o valor da função cadastrar 

    if($cadastrar==1){
    
    $_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  ..'.$nome.'. cadastrado com sucesso
                </div>';

    header("location:../back-stage/?url=cad_fornecedor");

    }else{
    $_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao cadastrar.'.$nome.'.
                </div> ';
    header("location:../back-stage/?url=cad_fornecedor");
      }

  }else{

    $_SESSION['alerta']='<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                  Já existe usuário .'.$nome.'.
                </div>';
  header("location:../back-stage/?url=cad_fornecedor");
  }
}




if($url=="editar"){ 


$id=$_POST['id'];
$nome=$_POST['nome'];
$endereco=$_POST['endereco'];
$contacto=$_POST['contacto'];

$editar=FORNECEDOR::editar($nome,$endereco,$contacto,$id);

if($editar==1){

$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-check"></i> Alerta</h5>
..'.$nome.'. Editado com sucesso
</div>';
header("location:../back-stage/?url=ver_fornecedor");  

}else{
$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-ban"></i> Alerta</h5>
Erro ao editar.'.$nome.'.
</div> ';
header("location:../back-stage/?url=ver_fornecedor");  
}
}




if($url=="eliminar"){

$id=$_GET['cod'];

$eliminar=FORNECEDOR::eliminar($id);
if($eliminar==1){

  $_SESSION['alerta']=' <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Eliminado com sucesso.
                </div> ';
  header("location:../back-stage/?url=ver_fornecedor");  

}else{
  
  $_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao eliminar.
                </div> ';
  header("location:../back-stage/?url=ver_fornecedor");   

}

}




}




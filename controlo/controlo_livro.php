<?php
session_start();
require_once'../conexao/conexao.php';
require_once'../modelo/modelo_livro.php';

$pdo=conectar();


if(isset($_GET['url']) && $_GET['url']!=null){//verifica se existe um url 
//chmod ("../img/", 777);

  $url=$_GET['url'];// caso existir ela captura
    
    
if($url=="cadastrar"){ 

    $titulo=$_POST['titulo'];
    $autor=$_POST['autor'];
    $ano=$_POST['ano'];
    $categoria=$_POST['categoria'];
    $editora=$_POST['editora'];
    $prate=$_POST['prateleira'];
    $estado=$_POST['estado'];
    
     $extensao=strrchr($_FILES['file']['name'], ".");// pega a extensão da imagem a ser passada
  
    $foto="livro".date("Y").date("m").date("d").date("s").$extensao;//criamos um novo nome para imagem
    

    $q=" select * from livros where titulo='$titulo' and categoria='$categoria'";// verifica se esse Livro já existe na base de dados
    $busca=$pdo->prepare($q);
    $busca->execute();

    $contador=$busca->rowCount();
    if($contador <=0){// se não existir nenhum livro ele vai cadastrar

    $cadastrar=LIVRO::salvar($titulo,$autor,$categoria,$estado,$foto,$ano,$prate,$editora);//recebe o valor da função cadastrar 

    if($cadastrar==1){ 
    move_uploaded_file($_FILES['file']['tmp_name'], "../img/".$foto);

    $_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  ..'.$titulo.'. cadastrado com sucesso
                </div>';

    header("location:../back-stage/?url=cad_livro");

    }else{
    $_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao cadastrar.'.$titulo.'.
                </div> ';
    header("location:../back-stage/?url=cad_livro");
      }

  }else{

    $_SESSION['alerta']='<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                  Já existe Livro.'.$titulo.'. cadastrado no sistema
                </div>';
  header("location:../back-stage/?url=cad_livro");
  }
}
















if($url=="editar"){ 

$id=$_POST['id'];
$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$ano=$_POST['ano'];
$categoria=$_POST['categoria'];
$editora=$_POST['editora'];
$prate=$_POST['prateleira'];
$estado=$_POST['estado'];
  $f=$_POST['foto'];    
     
 
   if($_FILES['file']['error']>0){// verifica se o usuário selecionou uma foto caso não usa a foto antiga
    
      $foto=$f;
    
    }else{

      $extensao=strrchr($_FILES['file']['name'], ".");// pega a extensão da imagem a ser passada
  
    $foto="livro".date("Y").date("m").date("d").date("s").$extensao;//criamos um novo nome para imagem
    }

    $editar=LIVRO::editar($titulo,$autor,$categoria,$estado,$foto,$ano,$prate,$editora,$id);
    
    move_uploaded_file($_FILES['file']['tmp_name'], "../img/".$foto);

    if($editar==1){
    $_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  ..'.$titulo.'. Editado com sucesso
                </div>';
 header("location:../back-stage/?url=ver_livro");  

    }else{
        $_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao editar.'.$titulo.'.
                </div> ';
  header("location:../back-stage/?url=ver_livro");  
    }
}

























if($url=="eliminar"){

$id=$_GET['cod'];

$eliminar=LIVRO::eliminar($id);
if($eliminar==1){

$_SESSION['alerta']=' <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Livro Eliminado com sucesso.
                </div> ';
  header("location:../back-stage/?url=ver_livro");  

}else{
  
  $_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao eliminar Livro.
                </div> ';
  header("location:../back-stage/?url=ver_livro");   

}

}




}




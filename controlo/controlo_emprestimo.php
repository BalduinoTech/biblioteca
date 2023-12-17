<?php
session_start();
require_once'../modelo/modelo_emprestimo.php';

if(isset($_GET['url']) && $_GET['url']!=null){//verifica se existe um url 

    $url=$_GET['url'];// caso existir ela captura
    
if($url=="cadastrar"){ 

    $livro=$_POST['livro'];
    $dataEmprestimo=$_POST['datainicio'];
    $dataDevolu=$_POST['datafinal'];
  	$estadoLivro=$_POST['estado'];
   	$situacao="EMPRESTIMO";
   	$utente=$_POST['utente'];
   	$fone=$_POST['telefone'];
   	$endereco=$_POST['endereco'];

    $cadastrar=EMPRESTIMO::salvar($livro,$dataEmprestimo,$dataDevolu,$estadoLivro,$situacao,$utente,$fone,$endereco);//recebe o valor da função cadastrar 

    if($cadastrar==1){
    
    $_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  '.$utente.'. cadastrado com sucesso
                </div>';

    header("location:../back-stage/?url=cad_emprestimo");

    }else{
    $_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao cadastrar.'.$utente.'.
                </div> ';
    header("location:../back-stage/?url=cad_emprestimo");
      }

  }



if($url=="cancelar"){

$id=$_GET['cod'];

$cancelado=EMPRESTIMO::editarEstado("CANCELADO",$id);

if($cancelado==1){
 
    $_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                   Operação realizada com sucesso
                </div>';

    header("location:../back-stage/?url=ver_emprestimo");
}else{
	    $_SESSION['alerta']='<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                   Operação não realizada com sucesso
                </div>';

    header("location:../back-stage/?url=ver_emprestimo");
}

}


}


<?php
session_start();
require_once'../modelo/m_login.php';
$login=new login();

if(isset($_GET['rota'])){
$rota=$_GET['rota'];

if($rota=="login"){

if(isset($_POST['usuario'])&& isset($_POST['senha'])){
	
    $usuario=$_POST['usuario'];
	
    $senha=$_POST['senha'];
	
    $aut=$login->logar($usuario,$senha);

    if(empty($aut)){

    $_SESSION['alerta']='usuário ou senha errada';

header("location:../");
   

    }else{

    	$_SESSION['idusuario']=$aut['IDFuncionario'];
    	
        $_SESSION['nome']=$aut['Nome'];
    	
       // if($aut['perfil']=="MAT"){
           
         header("location:../back-stage/?url=painel");

    	//}



    }

}
}

if($rota=="sair"){
unset($_SESSION['nome'],$_SESSION['idusuario']);
session_destroy();
header("location:../");

}



}
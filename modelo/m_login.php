<?php

require_once'../conexao/conexao.php';

class LOGIN 
{


public  static function logar($usuario,$senha){

$conexao=conectar();
$busca=$conexao->prepare("select * from funcionarios where usuario=?");
$busca->bindParam(1,$usuario);
$busca->execute();
$user=$busca->fetch(PDO::FETCH_ASSOC);
if(password_verify($senha,$user['Senha'])){
return $user;
}else{
return null;
}
	

}}
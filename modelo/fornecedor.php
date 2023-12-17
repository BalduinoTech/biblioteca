<?php

require_once'../conexao/conexao.php';

class FORNECEDOR
{

	public static function salvar($nome,$endereco,$contato):int
	{
		$conexao=conectar();
		$q="insert into Fornecedores (Nome,Contato,Endereco) values(:n,:c,:e)";
		$insert=$conexao->prepare($q);
		$insert->bindValue(":n",$nome);
		$insert->bindValue(":c",$contato);
		$insert->bindValue(":e",$endereco);
		return $insert->execute() ? 1:0;

	}

	public static function editar($nome,$endereco,$contato,$id):int
	{
		$conexao=conectar();
		$q="update  Fornecedores set Nome=:n,Contato=:c,Endereco=:e where IDFornecedor=:id";
		$insert=$conexao->prepare($q);
		$insert->bindValue(":n",$nome);
		$insert->bindValue(":c",$contato);
		$insert->bindValue(":e",$endereco);
		$insert->bindValue(":id",$id);
		return $insert->execute() ? 1:0;

	}

	public static function eliminar($id):int
	{
		$conexao=conectar();
		$q="delete from Fornecedores where IDFornecedor=:id";
		$insert=$conexao->prepare($q);
		$insert->bindValue(":id",$id);
		
		return $insert->execute() ? 1:0;

	}
}
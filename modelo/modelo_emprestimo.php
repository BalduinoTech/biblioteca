<?php

require_once'../conexao/conexao.php';

class EMPRESTIMO{

public static function salvar($livro,$dataEmprestimo,$dataDevolu,$estadoLivro,$situacao,$utente,$fone,$endereco):int{

$conexao=conectar();

$q="insert into emprestimos (IDLivro,DataEmprestimo,DataDevolucaoPrevista,EstadoLivroEmprestimo,estado,utente,telefone,enderco) values(:i,:de,:dd,:el,:e,:u,:t,:en)";

$insert=$conexao->prepare($q);
$insert->bindValue(":i",$livro);
$insert->bindValue(":de",$dataEmprestimo);
$insert->bindValue(":dd",$dataDevolu);
$insert->bindValue(":el",$estadoLivro);
$insert->bindValue(":e",$situacao);
$insert->bindValue(":u",$utente);
$insert->bindValue(":t",$fone);
$insert->bindValue(":en",$endereco);

return $insert->execute() ? 1 :0;

}



public static function editar($livro,$dataEmprestimo,$dataDevolu,$estadoLivro,$utente,$fone,$endereco,$id):int{

$conexao=conectar();

$q="update emprestimos set IDLivro=:i,DataEmprestimo=:de,DataDevolucaoPrevista=:dd,EstadoLivroEmprestimo=:el,utente=:u,telefone=:t,enderco=:en where IDEmprestimo:id";

$insert=$conexao->prepare($q);
$insert->bindValue(":i",$livro);
$insert->bindValue(":de",$dataEmprestimo);
$insert->bindValue(":dd",$dataDevolu);
$insert->bindValue(":el",$estadoLivro);
$insert->bindValue(":id",$id);
$insert->bindValue(":u",$utente);
$insert->bindValue(":t",$fone);
$insert->bindValue(":en",$endereco);

return $insert->execute() ? 1 :0;

}

public static function editarEstado($estado,$id):int{

$conexao=conectar();

$q="update emprestimos set estado=:e where IDEmprestimo=:id";

$insert=$conexao->prepare($q);
$insert->bindValue(":e",$estado);
$insert->bindValue(":id",$id);



return $insert->execute() ? 1 :0;

}

}

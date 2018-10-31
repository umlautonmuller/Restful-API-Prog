<?php

header('Content-Type: application/json');

require_once '../../config/Conexao.php';
require_once '../../models/Post.php';

if($_SERVER['REQUEST_METHOD']=='PUT'){

	$db = new Conexao();
	$pdo = $db->getConexao();

	$post = new Post($pdo);
	
	$dados = json_decode(file_get_contents("php://input"));	
	
	$post->id = $dados->id;
	$post->titulo = $dados->titulo;
	$post->texto = $dados->texto;
	$post->id_categoria = $dados->id_categoria;
	$post->autor = $dados->autor;

	if($post->update()) {
		$res = array('mensagem','Post atualizada');
	} else {
		$res = array('mensagem','Erro na atualização da Post');
	}
	echo json_encode($res);
} else {
	echo json_encode(['mensagem'=> 'método não suportado']);
}
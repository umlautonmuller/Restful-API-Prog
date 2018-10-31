<?php
	header('Content-Type: application/json');

	require_once '../../config/Conexao.php';
	require_once '../../models/Categoria.php';

	if($_SERVER['REQUEST_METHOD']=='PUT'){

		$db = new Conexao();
		$pdo = $db->getConexao();

		$categoria = new Categoria($pdo);
		
        $dados = json_decode(file_get_contents("php://input"));	
        
        $categoria->id = $dados->id;
		$categoria->nome = $dados->nome;
		$categoria->descricao = $dados->descricao;

		if($categoria->update()) {
			$res = array('mensagem','Categoria atualizada');
		} else {
			$res = array('mensagem','Erro na atualização da categoria');
		}
		echo json_encode($res);
	}else{
		echo json_encode(['mensagem'=> 'método não suportado']);
	}
<?php

	header('Acess-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	
	require_once '../../config/Conexao.php';
	require_once '../../models/Categoria.php';

	$db = new Conexao();
	$pdo = $db->getConexao();

    $categoria = new Categoria($pdo);

    $resultado = $categoria->read();

    $qtde_cats = sizeof($resultado);

    if($qtde_cats>0){
        echo json_encode($resultado);
    }else{
        echo json_encode(array('mensagem' => 'nenhuma categoria encontrada'));
    }
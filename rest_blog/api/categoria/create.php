<?php

header('Content-Type: Application/JSON');

// Arquivo para testar o método create()

include_once '../../config/Conexao.php';
include_once '../../models/Categoria.php';

$db = new Conexao();
$conexao = $db->getConexao();

$cat = new Categoria($conexao);              

$cat->nome = $_POST['nome'];
$cat->descricao = $_POST['descricao'];

if($cat->create()) {
    $res = array('Mensagem', 'Categoria criada');
    // http_response_code(201);
} else {
    $res = array('Mensagem', 'Erro na criação da categoria');
}

echo json_encode($res);
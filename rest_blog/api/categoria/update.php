<?php

header('Content-Type: Application/JSON');

// Arquivo para testar o método update()

include_once '../../config/Conexao.php';
include_once '../../models/Categoria.php';

$db = new Conexao();
$conexao = $db->getConexao();

$cat = new Categoria($conexao);              


$cat->id = $_POST['id'];
$cat->nome = $_POST['nome'];
$cat->descricao = $_POST['descricao'];

if($cat->update()) {
    $res = array('Mensagem', 'Categoria atualizada');
} else {
    $res = array('Mensagem', 'Erro ao atualizar a categoria');
}

echo json_encode($res);
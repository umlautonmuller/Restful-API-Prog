<?php

header('Content-Type: Application/JSON');

// Arquivo para testar o método delete()

include_once '../../config/Conexao.php';
include_once '../../models/Categoria.php';

$db = new Conexao();
$conexao = $db->getConexao();

$cat = new Categoria($conexao);              


$cat->id = $_POST['id'];

if($cat->delete()) {
    $res = array('Mensagem', 'Categoria deletada');
} else {
    $res = array('Mensagem', 'Erro ao deletar a categoria');
}

echo json_encode($res);
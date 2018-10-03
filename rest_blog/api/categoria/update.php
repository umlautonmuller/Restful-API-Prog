<?php

header('Content-Type: application/json');

// Arquivo para testar o método update()

include_once '../../config/Conexao.php';
include_once '../../models/Categoria.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $db = new Conexao();
    $conexao = $db->getConexao();

    $cat = new Categoria($conexao);              

    $dados = json_decode(file_get_contents("php://input"));

    $cat->id = $dados->id;
    $cat->nome = $dados->nome;
    $cat->descricao = $dados->descricao;

    try {
        $cat->update(); 
    }catch(PDOException $e){
        echo $e->getMessage();
    }

/*
    if($cat->update()) {
        $res = array('Mensagem' => 'Categoria atualizada');
    } else {
        $res = array('Mensagem' => 'Erro ao atualizar a categoria');
    }
    echo json_encode($res);
    */
} else {
    echo json_encode(['Mensagem' => 'Método não suportado']);
}
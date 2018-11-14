<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../../config/Conexao.php';
require_once '../../models/Post.php';

$db = new Conexao();
$pdo = $db->getConexao();

$post = new Post($pdo);


if (isset($_GET['id'])){ //dados de um POST
    $resultado = $post->read($_GET['id']);
}elseif(isset($_GET['idcategoria'])){//todos os posts de uma cat
	$resultado = $post->read(null, $_GET['idcategoria']);
}else{//todos os posts
	$resultado = $post->read();
}

//read() - todos
//read(null, $idcategoria)

$qtde_cats = sizeof($resultado);

if($qtde_cats>0){
    // $arr_posts = array();
    // $arr_posts['data'] = array();

    echo json_encode($resultado);
} else {
    echo json_encode(array('mensagem' => 'nenhuma post encontrada'));
}
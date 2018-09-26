<?php

header('Content-Type: Application/JSON');

// Arquivo para testar o método read()

include_once '../../config/Conexao.php';
include_once '../../models/Categoria.php';

$db = new Conexao();
$conexao = $db->getConexao();

$cat = new Categoria($conexao);              

$resultado = $cat->read();

echo json_encode($resultado);
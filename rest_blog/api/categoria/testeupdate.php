<?php

include_once '../../config/Conexao.php';
include_once '../../models/Categoria.php';

$db = new Conexao();
$conexao = $db->getConexao();

$cat = new Categoria($conexao);              

$cat->id = '1';
$cat->nome = 'novo valor';
$cat->descricao = 'novo valor';

if($cat->update()){
    echo 'Sim';  
}else{
    echo 'Nao';
}

<?php

require_once "buscarLivro.php";

function salvarCookieLista($lista){
    setcookie("livros",json_encode($lista),time()+3600,"/");
}

function criarLivro($dadosLivro){
    $listaLivros = buscarListaLivro();
    $idNovoLivro = count($listaLivros) + 1;
    $dadosLivro ["id"] = $idNovoLivro;
    $listaLivros[] = $dadosLivro;

    salvarCookieLista($listaLivros);

    return $dadosLivro;
}


?>
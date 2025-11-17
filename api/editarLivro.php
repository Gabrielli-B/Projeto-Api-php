<?php

require_once "buscarLivro.php";
require_once "criarLivro.php";

function editarLivro($id,$dadosNovos){
    $lista = buscarListaLivro();
    $encontrado = false;

    foreach($lista as $indice => $livro){
        if($livro["id"] === $id){
            $lista[$indice] = array_merge($livro,$dadosNovos);
            $encontrado = true;
            break;
        }
    }

    if($encontrado === false){
        return false;
    }

    salvarCookieLista($lista);
    return $lista[$indice];

}

?>
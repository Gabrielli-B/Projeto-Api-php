<?php

function buscarListaLivro(){
    if(isset($_COOKIE["livros"])){
        $lista = json_decode($_COOKIE["livros"],true);
        return $lista;
    }
    return [];
}

?>
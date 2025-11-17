<?php

function validarLivro($dados){
    if(!isset($dados["nome"]) || trim($dados["nome"]) === ""){
        return "Campo: [Nome] é obrigatório";
    }
    if(!isset($dados["autor"]) || trim($dados["autor"]) === ""){
        return "Campo: [Autor] é obrigatório";
    }
    if(!isset($dados["genero"]) || trim($dados["genero"]) === ""){
        return "Campo: [Gênero] é obrigatório";
    }
    if(!isset($dados["ano"]) || trim($dados["ano"]) === ""){
        return "Campo: [Ano] é obrigatório";
    }

    return true;
}

?>
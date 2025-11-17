<?php
header("Content-Type: application/json; charset=utf-8");

session_start();

require_once "../utils/funcoesAux.php";
require_once "../utils/validacoes.php";
require_once "criarLivro.php";
require_once "buscarLivro.php";
require_once "editarLivro.php";

if(!isset($_SESSION["acessos"])){
    $_SESSION["acessos"] = 0;
}

$_SESSION["acessos"]++;

$_SESSION["ultimo_acesso"] = date("Y-m-d H:i:s");

$metodo = isset($_GET["metodo"]) ? $_GET["metodo"] : null;

if($metodo === "criar"){
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        respostaJson(405,false,"Método não permitido");
    }

    $corpoRequisicaoJson = file_get_contents("php://input");
    $dadosRecebidosJson = json_decode($corpoRequisicaoJson,true);

    if(!$dadosRecebidosJson){
        respostaJson(400,false,"Requisição inválida");
    }

    $erroValidadorLivro = validarLivro($dadosRecebidosJson);
    if($erroValidadorLivro != true){
        respostaJson(400,false,$erroValidadorLivro);
    }

    $livroCriado = criarLivro($dadosRecebidosJson);

    respostaJson(201,true,"Livro criado com sucesso",$livroCriado);
}

if($metodo === "editar"){
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        respostaJson(405,false,"Método não permitido");
    }

    $corpoRequisicaoJson = file_get_contents("php://input");
    $dadosRecebidosJson = json_decode($corpoRequisicaoJson,true);

    if(!$dadosRecebidosJson){
        respostaJson(400,false,"Requisição inválida");
    }

    $erroValidadorLivro = validarLivro($dadosRecebidosJson);
    if($erroValidadorLivro != true){
        respostaJson(400,false,$erroValidadorLivro);
    }

    $id = $dadosRecebidosJson["id"];

    $edicao = editarLivro($id,$dadosRecebidosJson);

    if(!$edicao){
        respostaJson(404,false,"Id não encontrado");
    }else{
        respostaJson(200,true,"Registro atualizado",$edicao);
    }
}

if($metodo === "listar"){
    if($_SERVER["REQUEST_METHOD"] != "GET"){
        respostaJson(405,false,"Método não permitido");      
    }

    $lista = buscarListaLivro();

    if(empty($lista)){
        respostaJson(404,false,"Lista vazia");    
    }
    respostaJson(200,true,"Lista de livros encontrada",$lista);
}

if($metodo === "sessao"){
    respostaJson(200,true,"Dados da sessão",[
        "acessos" => $_SESSION["acessos"],
        "ultimo_acesso" => $_SESSION["ultimo_acesso"]
    ]);
}

respostaJson(404,false,"Não encontrado");


?>
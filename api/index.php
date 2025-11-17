<?php
header("Content-Type: application/json; charset=utf-8");

session_start();

require_once "../utils/funcoesAux.php";
require_once "../utils/validacoes.php";
require_once "criarLivro.php";
require_once "buscarLivro.php";

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
}else{
    respostaJson(404,false,"Não encontrado");
}

?>
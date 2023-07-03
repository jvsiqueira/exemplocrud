<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}


if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/EXEMPLO/NEGOCIO/ALUNO/alunoNegocio.php';


$dados = json_decode($_POST['dados']);

if ($dados->operacao == 1) {
    echo AlunoNegocio::salvar($dados);
}
if ($dados->operacao == 2) {
    echo AlunoNegocio::atualizaAluno($dados);
}
if ($dados->operacao == 3) {
    echo AlunoNegocio::removeA($dados->id);
}

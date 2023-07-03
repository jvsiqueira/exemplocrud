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


require_once $_SERVER['DOCUMENT_ROOT'] . '/EXEMPLO/NEGOCIO/ADM/admNegocio.php';


$dados = json_decode($_POST['dados']);

if ($dados->operacao == 1) {
    $dados->senha = md5($dados->senha);
    //echo "SELECT * FROM adm WHERE login = " . $dados->login . " AND senha = " . $dados->senha;
    $login = AdmDAO::login($dados);
    if (is_object($login)) {
        session_start();
        $_SESSION["loginUsuario"] = json_encode($login);
        echo 1;
    } else {
        echo 0;
    }
}
if ($dados->operacao == 2) {
    session_start();
    try {
        unset($_SESSION["loginUsuario"]);
        echo 1;
    } catch (\Throwable $th) {
        echo 0;
    }
}

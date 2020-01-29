<?php

require_once "consulta.php";
require_once "conectar.php";

$frmnome = $_POST['nome'];
$frmsenha = $_POST['senha'];

//Padrão dentro do objeto, Para fazer as busca dentro de login;
$table = 'login';
$conexao = $conn;

//Manipulado conforme necessário
$campo = 'nome';
$comparar = $frmnome;


$usuario = new Consulta($table, $campo, $comparar, $conexao);
$r_usuario = $usuario->resultado();

$rowsbd = mysqli_num_rows($r_usuario);

if($rowsbd > 0){
    $campo = 'senha';
    $comparar = $frmsenha;
    $senha = new Consulta($table, $campo, $comparar, $conexao);

    $r_senha = $senha->resultado();

    $rowsbd = mysqli_num_rows($r_senha);
    if($rowsbd > 0){
        $retorno = ["message"=>"Bem-vindo, Acesso Permitido","retorno"=>true];
        echo json_encode($retorno);
    }else{
        $retorno = ["message"=>"Usuário ou senha Incorreta","retorno"=>false];
        echo json_encode($retorno);
    }
}else{
    $retorno = ["message"=>"Nenhum Usuário Localizado","retorno"=>false];
    echo json_encode($retorno);
}

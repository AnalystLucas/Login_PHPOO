<?php

require_once "conectar.php";
require_once "consulta.php";
require_once "cadastrar.php";

$nome = $_POST['nome'];
$senha = $_POST['senha'];

//Tabela padrão desse cenário, e campo que vai ser buscado.
$table = "login";
$campo = "nome";
//Conexão vem do conectar.php e é passada para o objeto;
$conexao = $conn;


$c_existente = new Consulta($table, $campo, $nome, $conexao);
$r_existente = $c_existente->resultado();

$rowsbd = mysqli_num_rows($r_existente);

if($rowsbd > 0){

    $retorno = ["message"=>"Nome de usuário em uso","retorno"=>false];
    echo json_encode($retorno);

}else{

    $cadastro = new Cadastrar($table, $nome, $senha, $conexao);
    $result = $cadastro->cadastrar();
    
    if($result == true){
        $retorno = ["message"=>"Cadastro realizado com sucesso !","retorno"=>true];
        echo json_encode($retorno);
    }else{
        $retorno = ["message"=>"Não foi possivel completar seu cadastro, tente novamente mais tarde","retorno"=>false];
        echo json_encode($retorno);
    }

}



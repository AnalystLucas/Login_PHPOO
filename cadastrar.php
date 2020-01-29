<?php 
    // INSERT INTO `login`(`id_login`, `nome`, `senha`) VALUES ([value-1],[value-2],[value-3])
class Cadastrar{
    public $table;
    public $nome;
    public $senha;
    public $conexao; 
    public $result;

    public function __construct($table, $nome, $senha, $conexao)
    {
        $this->table = $table; 
        $this->nome = $nome; 
        $this->senha =$senha;
        $this->conexao = $conexao;
        
        $sql = "INSERT INTO `login`(`id_login`, `nome`, `senha`) VALUES (null, '$nome', '$senha')";
        $result = mysqli_query($conexao, $sql);
        $this->result = $result;
    }

    public function cadastrar(){
        $result = $this->result;
        return $result;
    }


}
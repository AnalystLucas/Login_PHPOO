<?php 

class Consulta{
    public $table;
    public $campo;
    public $comparar;
    public $conexao;
    public $result;

    public function __construct($table, $campo, $comparar, $conexao)
    {       
        $this->table = $table;
        $this->campo = $campo;
        $this->comparar = $comparar;
        $this->conexao = $conexao;

        $sql = "SELECT * FROM $table WHERE $campo = '$comparar'";
        $this->result = $result = mysqli_query($conexao, $sql);

    }
    public function resultado(){
        $result = $this->result;
        return $result;
    }
}
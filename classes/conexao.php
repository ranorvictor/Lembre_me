<?php
class Conexao{
    private $servidor = "localhost";
    private $banco = "lembre_me";
    private $usuario = "root";
    private $senha = "aluno";
    protected $conexao;
    public function conectar(){
        $this->conexao = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->banco, $this->usuario, $this->senha);
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

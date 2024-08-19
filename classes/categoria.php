<?php
include_once "conexao.php";
class Categoria extends Conexao{
    public function __construct(){
        $this->conectar();
    }
    public function cadastrar($dados){
        $consulta = $this->conexao->prepare("INSERT INTO categoria values(0,:p1,:p2)");
        $consulta->bindValue(":p1", $dados["categoria"]);
        $consulta->bindValue(":p2", $_SESSION["id_usuario"]);
        $consulta->execute();
    }
    public function alterar($dados){
        $consulta = $this->conexao->prepare("UPDATE categoria SET categoria=:p1 WHERE id_usuario=:p2");
        $consulta->bindValue(":p1", $dados["categoria"]);
        $consulta->bindValue(":p2", $_SESSION["id_usuario"]);
        $consulta->execute();
    }
    public function excluir($id){
        $consulta = $this->conexao->prepare("DELETE FROM categoria WHERE id_categoria=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
    }
    public function listar($id){
        $consulta = $this->conexao->prepare("SELECT * FROM categoria WHERE id_usuario=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    public function consultar($id){
        $consulta = $this->conexao->prepare( "SELECT * FROM categoria WHERE id_categoria=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
        return $consulta->fetch();
    }
}

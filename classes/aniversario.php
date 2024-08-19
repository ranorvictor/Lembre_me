<?php
include_once "conexao.php";
class Aniversario extends Conexao{
    public function __construct(){
        $this->conectar();
    }
    public function cadastrar($dados){
        $consulta = $this->conexao->prepare("INSERT INTO aniversariantes values(0,:p1,:p2,:p3,:p4,:p5)");
        $consulta->bindValue(":p1", $_SESSION["id_usuario"]);
        $consulta->bindValue(":p2", $dados["id_local"]);
        $consulta->bindValue(":p3", $dados["nome_niver"]);
        $consulta->bindValue(":p4", $dados["data_niver"]);
        $consulta->bindValue(":p5", $dados["descricao_niver"]);
        $consulta->execute();
    }
    public function alterar($dados){
        $consulta = $this->conexao->prepare("UPDATE aniversariantes SET id_local=:p1, nome_niver=:p2, data_niver=:p3, descricao_niver=:p4 WHERE id_usuario=:p5");
        $consulta->bindValue(":p1", $dados["id_local"]);
        $consulta->bindValue(":p2", $dados["nome_niver"]);
        $consulta->bindValue(":p3", $dados["data_niver"]);
        $consulta->bindValue(":p4", $dados["descricao_niver"]);
        $consulta->bindValue(":p5", $_SESSION["id_usuario"]);
        $consulta->execute();
    }
    public function excluir($id){
        $consulta = $this->conexao->prepare("DELETE FROM aniversariantes WHERE id_aniversariante=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
    }
    public function listar($id){
        $consulta = $this->conexao->prepare("SELECT * FROM aniversariantes INNER JOIN local ON aniversariantes.id_local=local.id_local WHERE aniversariantes.id_usuario=:p1 ORDER BY data_niver DESC");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    public function consultar($id){
        $consulta = $this->conexao->prepare( "SELECT * FROM aniversariantes INNER JOIN local ON aniversariantes.id_local=local.id_local WHERE id_aniversariante=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
        return $consulta->fetch();
    }
}

<?php
include_once "conexao.php";
class Eventos extends Conexao{
    public function __construct(){
        $this->conectar();
    }
    public function cadastrar($dados){
        $consulta = $this->conexao->prepare("INSERT INTO eventos values(0,:p1,:p2,:p3,:p4,:p5)");
        $consulta->bindValue(":p1", $_SESSION["id_usuario"]);
        $consulta->bindValue(":p2", $dados["id_local"]);
        $consulta->bindValue(":p3", $dados["titulo_evento"]);
        $consulta->bindValue(":p4", $dados["descricao_evento"]);
        $consulta->bindValue(":p5", $dados["data_evento"]);
        $consulta->execute();
    }
    public function alterar($dados){
        $consulta = $this->conexao->prepare("UPDATE eventos SET id_local=:p1, titulo_evento=:p2, descricao_evento=:p3, data_evento=:p4 WHERE id_usuario=:p5");
        $consulta->bindValue(":p1", $dados["id_local"]);
        $consulta->bindValue(":p2", $dados["titulo_evento"]);
        $consulta->bindValue(":p3", $dados["descricao_evento"]);
        $consulta->bindValue(":p4", $dados["data_evento"]);
        $consulta->bindValue(":p5", $_SESSION["id_usuario"]);
        $consulta->execute();
    }
    public function excluir($id){
        $consulta = $this->conexao->prepare("DELETE FROM eventos WHERE id_eventos=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
    }
    public function listar($id){
        $consulta = $this->conexao->prepare("SELECT * FROM eventos INNER JOIN local ON eventos.id_local=local.id_local WHERE eventos.id_usuario=:p1 ORDER BY data_evento DESC");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    public function consultar($id){
        $consulta = $this->conexao->prepare( "SELECT * FROM eventos INNER JOIN local ON eventos.id_local=local.id_local WHERE id_eventos=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
        return $consulta->fetch();
    }
}

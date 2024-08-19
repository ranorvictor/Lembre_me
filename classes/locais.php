<?php
include_once "conexao.php";
class Locais extends Conexao{
    public function __construct(){
        $this->conectar();
    }
    public function cadastrar($dados){
        $consulta = $this->conexao->prepare("INSERT INTO local values(0,:p1,:p2,:p3,:p4,:p5,:p6)");
        $consulta->bindValue(":p1", $_SESSION["id_usuario"]);
        $consulta->bindValue(":p2", $dados["nome_local"]);
        $consulta->bindValue(":p3", $dados["rua"]);
        $consulta->bindValue(":p4", $dados["numero"]);
        $consulta->bindValue(":p5", $dados["complemento"]);
        $consulta->bindValue(":p6", $dados["bairro"]);
        $consulta->execute();
    }
    public function alterar($dados){
        $consulta = $this->conexao->prepare("UPDATE local SET nome_local=:p1, rua=:p2, numero=:p3, complemento=:p4, bairro=:p5  WHERE id_usuario=:p6");
        $consulta->bindValue(":p1", $dados["nome_local"]);
        $consulta->bindValue(":p2", $dados["rua"]);
        $consulta->bindValue(":p3", $dados["numero"]);
        $consulta->bindValue(":p4", $dados["complemento"]);
        $consulta->bindValue(":p5", $dados["bairro"]);
        $consulta->bindValue(":p6", $_SESSION["id_usuario"]);
        $consulta->execute();
    }
    public function excluir($id){
        $consulta = $this->conexao->prepare("DELETE FROM local WHERE id_local=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
    }
    public function listar($id){
        $consulta = $this->conexao->prepare("SELECT * FROM local WHERE id_usuario=:p1 ORDER BY nome_local ASC");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    public function consultar($id){
        $consulta = $this->conexao->prepare("SELECT * FROM local WHERE id_local=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
        return $consulta->fetch();
    }
}
?>
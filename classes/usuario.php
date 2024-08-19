<?php
include_once "conexao.php";
class Usuario extends Conexao{
    public function __construct(){
        $this->conectar();
    }
    public function cadastrar($dados){
        $consulta = $this->conexao->prepare("INSERT INTO usuario values(0,:p1,:p2,:p3,:p4,:p5)");
        $consulta->bindValue(":p1", $dados["nome"]);
        $consulta->bindValue(":p2", $dados["e_mail"]);
        $consulta->bindValue(":p3", $dados["usuario"]);
        $consulta->bindValue(":p4", md5($dados["senha"]));
        $consulta->bindValue(":p5", $dados["data_nascimento"]);
        $consulta->execute();
    }
    public function alterar($dados){
        if($dados["senha"]!="" && $dados["senha"]==$dados["senha2"]){
            $consulta = $this->conexao->prepare("UPDATE usuario SET nome=:p1, e_mail=:p2, usuario=:p3, senha=:p4, data_nascimento=:p5  WHERE id_usuario=:p6");
            $consulta->bindValue(":p1", $dados["nome"]);
            $consulta->bindValue(":p2", $dados["e_mail"]);
            $consulta->bindValue(":p3", $dados["usuario"]);
            $consulta->bindValue(":p4", md5($dados["senha"]));
            $consulta->bindValue(":p5", $dados["data_nascimento"]);
            $consulta->bindValue(":p6", $_SESSION["id_usuario"]);
            $consulta->execute();
        }else{
            $consulta = $this->conexao->prepare("UPDATE usuario SET nome=:p1, e_mail=:p2, usuario=:p3, data_nascimento=:p4  WHERE id_usuario=:p5");
            $consulta->bindValue(":p1", $dados["nome"]);
            $consulta->bindValue(":p2", $dados["e_mail"]);
            $consulta->bindValue(":p3", $dados["usuario"]);
            $consulta->bindValue(":p4", $dados["data_nascimento"]);
            $consulta->bindValue(":p5", $_SESSION["id_usuario"]);
            $consulta->execute();
        }
    }
    public function excluir($id){
        $consulta = $this->conexao->prepare("DELETE FROM usuario WHERE id_usuario=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
    }
    public function listar(){
        $consulta = $this->conexao->prepare("SELECT * FROM usuario");
        $consulta->execute();
        return $consulta->fetchAll();
    }
    public function consultar($id){
        $consulta = $this->conexao->prepare("SELECT * FROM usuario WHERE id_usuario=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
        return $consulta->fetch();
    }
}
?>
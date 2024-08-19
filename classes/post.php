<?php
include_once "conexao.php";
class Post extends Conexao{
    private $total = 4;
    private $quantidade;
    public $qtd_paginas;
    public function __construct(){
        $this->conectar();
    }
    public function cadastrar($dados){
        $consulta = $this->conexao->prepare("INSERT INTO Post values(0,:p1,:p2,:p3,:p4)");
        $consulta->bindValue(":p1", $dados["id_categoria"]);
        $consulta->bindValue(":p2", $dados["titulo_post"]);
        $consulta->bindValue(":p3", $dados["conteudo"]);
        $consulta->bindValue(":p4", $_SESSION["id_usuario"]);
        $consulta->execute();
    }
    public function alterar($dados){
        $consulta = $this->conexao->prepare("UPDATE Post SET id_categoria=:p1, titulo_post=:p2, conteudo=:p3 WHERE id_usuario=:p4");
        $consulta->bindValue(":p1", $dados["id_categoria"]);
        $consulta->bindValue(":p2", $dados["titulo_post"]);
        $consulta->bindValue(":p3", $dados["conteudo"]);
        $consulta->bindValue(":p4", $_SESSION["id_usuario"]);
        $consulta->execute();
    }
    public function excluir($id){
        $consulta = $this->conexao->prepare("DELETE FROM Post WHERE id_post=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
    }
    public function listar($pagina=1){
        $inicio = ($pagina * $this->total) - $this->total;
        $this->quantidade = $this->getQuantidade();
        $this->qtd_paginas = ceil($this->quantidade/$this->total);
        if(isset($_GET["filtro"])){
            $categoria = "AND Post.id_categoria=:id";
            $consulta = $this->conexao->prepare( "SELECT * FROM Post INNER JOIN categoria ON Post.id_categoria=categoria.id_categoria WHERE Post.id_usuario=:p1 $categoria LIMIT :inicio, :total");
        }else{
            $consulta = $this->conexao->prepare("SELECT * FROM Post INNER JOIN categoria ON Post.id_categoria=categoria.id_categoria WHERE Post.id_usuario=:p1 LIMIT :inicio, :total");
        }
        $consulta->bindValue(":inicio", $inicio, PDO::PARAM_INT);
        $consulta->bindValue(":total", $this->total, PDO::PARAM_INT);
        $consulta->bindValue(":p1", $_SESSION["id_usuario"]);
        if (isset($_GET["filtro"])) {
            $consulta->bindValue(":id", $_GET["filtro"]);
        }
        $consulta->execute();
        return $consulta->fetchAll();
        if($_GET["filtro"]){

        }
    }
    public function getQuantidade(){
        if (isset($_GET["filtro"])) {
            $categoria = "WHERE Post.id_categoria=:id";
            $consulta = $this->conexao->prepare("SELECT COUNT(*) as quantidade FROM Post $categoria");
        }else{
            $consulta = $this->conexao->prepare("SELECT COUNT(*) as quantidade FROM Post");
        }
        if (isset($_GET["filtro"])) {
            $consulta->bindValue(":id", $_GET["filtro"]);
        }
        $consulta->execute();
        return $consulta->fetch()["quantidade"];
    }
    public function consultar($id){
        $consulta = $this->conexao->prepare( "SELECT * FROM Post INNER JOIN categoria ON Post.id_categoria=categoria.id_categoria WHERE id_post=:p1");
        $consulta->bindValue(":p1", $id);
        $consulta->execute();
        return $consulta->fetch();
    }
}

<?php
include "classes/categoria.php";
$objeto = new Categoria();
try{
    $objeto->excluir($_GET["id_categoria"]);
    echo "<script>alert('categoria excluida com sucesso!')</script>";
    echo "<script>location.href='index.php?arquivo=categoria/listar.php';</script>";
}catch(Exception $obj){
    echo "<script>alert('Você não pode excluir uma categoria que está sendo usada!')</script>";
    echo "<script>location.href='index.php?arquivo=categoria/listar.php';</script>";
}
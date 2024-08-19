<?php
include "classes/locais.php";
$objeto = new Locais();
try{
    $objeto->excluir($_GET["id_local"]);
    echo "<script>alert('Local excluido com sucesso!')</script>";
    echo "<script>location.href='index.php?arquivo=locais/listar.php';</script>";
}catch(Exception $obj){
    echo "<script>alert('Você não pode excluir um local que está sendo usada!')</script>";
    echo "<script>location.href='index.php?arquivo=locais/listar.php';</script>";
}
?>
<?php
include "classes/post.php";
$objeto = new Post();
$objeto->excluir($_GET["id_post"]);
echo "<script>alert('Post excluido com sucesso!')</script>";
echo "<script>location.href='index.php?arquivo=post/listar.php';</script>";

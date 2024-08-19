<?php
include "classes/aniversario.php";
$objeto = new Aniversario();
$objeto->excluir($_GET["id_aniversariante"]);
echo "<script>alert('Aniversariante excluido com sucesso!')</script>";
echo "<script>location.href='index.php?arquivo=aniversariantes/listar.php';</script>";

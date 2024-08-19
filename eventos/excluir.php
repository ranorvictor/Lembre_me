<?php
include "classes/eventos.php";
$objeto = new Eventos();
$objeto->excluir($_GET["id_eventos"]);
echo "<script>alert('Evento excluido com sucesso!')</script>";
echo "<script>location.href='index.php';</script>";

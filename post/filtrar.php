<table>
    <thead>
        <th>
            Filtrar post por:
        </th>
    </thead>
<?php
include "classes/categoria.php";
$objeto = new Categoria();
$resultado = $objeto->listar($_SESSION["id_usuario"]);
foreach ($resultado as $linha) {
        echo "<tr>";
            echo "<label><td><a href='index.php?arquivo=post/listar.php&filtro={$linha["id_categoria"]}'>{$linha["categoria"]}</a></td></label>";
        echo "</tr>";
    }
    echo "</table>";
?>
<a href="index.php?arquivo=categoria/cadastrar.php">Criar categoria</a>
<table>
    <thead>
        <th>Nome Categoria</th>
        <th>Ações</th>
    </thead>
    <?php
include "classes/categoria.php";
$objeto = new Categoria();
$resultado = $objeto->listar($_SESSION["id_usuario"]);
if ($resultado) {
    foreach ($resultado as $linha) {
        echo "<tr>";
        echo "<td>{$linha['categoria']}</td>";
        echo "<td><a href='index.php?arquivo=categoria/alterar.php&id_categoria={$linha["id_categoria"]}'><img src='fotos/alterar.png'></a>";
        echo "<a href='index.php?arquivo=categoria/excluir.php&id_categoria={$linha["id_categoria"]}'>X</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Não há locais cadastrados!</p>";
}
?>
<a href="index.php?arquivo=locais/cadastrar.php">Cadastre Locais</a>
<?php
include "classes/locais.php";
$objeto = new Locais();
$resultado = $objeto->listar($_SESSION["id_usuario"]);
if ($resultado) {
    foreach ($resultado as $linha) {
        echo "<br>";
        echo "<div class='local'>";
            echo "<p id='prin'>Nome do local: {$linha['nome_local']}</p><div class='show'><p>Rua: {$linha['rua']}</p><p>Numero: {$linha['numero']}</p><p>Complemento: {$linha['complemento']}</p><p>{$linha['bairro']}</p>";
            echo "<p><a href='index.php?arquivo=locais/alterar.php&id_local={$linha["id_local"]}'>Alterar</a>";
            echo "<a href='index.php?arquivo=locais/excluir.php&id_local={$linha["id_local"]}'>Excluir</a></p></div>";
        echo "</div>";
    }
} else {
    echo "<p>Não há locais cadastrados!</p>";
}
?>
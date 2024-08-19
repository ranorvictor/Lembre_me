<a href="index.php?arquivo=aniversariantes/cadastrar.php">Cadastre Aniversariantes</a>
<?php
include "classes/aniversario.php";
$objeto = new Aniversario();
$resultado = $objeto->listar($_SESSION["id_usuario"]);
if ($resultado) {
    foreach ($resultado as $linha) {
        $data = explode("-", $linha["data_niver"]);
        echo "<div class='niver'>";
        echo "<p id='prin'>Nome do Aniversariante: {$linha['nome_niver']} Data: {$data[2]}/{$data[1]}/{$data[0]} </p><div id='mos'><p>Local da Festa:{$linha['nome_local']}</p><p>Descrição: {$linha['descricao_niver']}</p>";
        echo "<p><a href='index.php?arquivo=aniversariantes/alterar.php&id_aniversariante={$linha["id_aniversariante"]}'>Alterar</a>";
        echo "<a href='index.php?arquivo=aniversariantes/excluir.php&id_aniversariante={$linha["id_aniversariante"]}'>Excluir</a></p></div>";
        echo "</div>";
    }
} else {
    echo "<p>Não há aniversariantes cadastrados!</p>";
}
?>
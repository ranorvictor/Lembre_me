<a href="index.php?arquivo=eventos/cadastrar.php">Cadastrar Evento</a>
<?php
include "classes/eventos.php";
$objeto = new Eventos();
$resultado = $objeto->listar($_SESSION["id_usuario"]);
if ($resultado) {
    foreach ($resultado as $linha) {
        $data = explode("-", $linha["data_evento"]);
        echo "<div class='eventos'>";
        echo "<p id='princ'>Evento: {$linha['titulo_evento']} Data: {$data[2]}/{$data[1]}/{$data[0]}</p><div id='ver'><p>{$linha['nome_local']}</p><p>{$linha['descricao_evento']}</p>";
        echo "<p><a href='index.php?arquivo=eventos/alterar.php&id_eventos={$linha["id_eventos"]}'>Alterar</a>";
        echo "<a href='index.php?arquivo=eventos/excluir.php&id_eventos={$linha["id_eventos"]}'>Excluir</a></p></div>";
        echo "</div>";
    }
} else {
    echo "<p>Não há eventos cadastrados!</p>";
}
?>
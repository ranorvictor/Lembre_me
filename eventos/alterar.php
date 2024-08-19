<?php
include "classes/eventos.php";
$id_eventos = $_GET["id_eventos"];
$objeto = new Eventos();
$linha = $objeto->consultar($id_eventos);
?>
<form action="" method="post">
    <fieldset>
        <legend>Cadastre</legend>
        <label>Título:<input maxlength="50" type="text" name="titulo_evento" value="<?= $linha["titulo_evento"] ?>" required></label>
        <label>
            Local: <select name="id_local">
                <option value="<?= $linha["id_local"] ?>"><?= $linha["nome_local"] ?></option>
                <?php
                include "classes/locais.php";
                $objeto = new Locais();
                $resultado = $objeto->listar($_SESSION["id_usuario"]);
                foreach ($resultado as $linha1) {
                    echo "<option value='{$linha1["id_local"]}'>{$linha1["nome_local"]}</option>";
                }
                ?>
            </select>
        </label>
        <label>Descrição:<input maxlength="255" type="text" name="descricao_evento" value="<?= $linha["descricao_evento"] ?>" required></label>
        <label>Data:<input type="Date" name="data_evento" value="<?= $linha["data_evento"] ?>" required></label>
    </fieldset>
    <button type="submit">Cadastrar</button>
</form>
<?php
if ($_POST) {
    $objeto = new Eventos();
    $objeto->alterar($_POST);
    echo "<script>alert('Evento alterado com sucesso!')</script>";
    echo "<script>location.href='index.php';</script>";
}
?>
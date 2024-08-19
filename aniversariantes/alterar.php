<?php
include "classes/aniversario.php";
$id_aniversariantes = $_GET["id_aniversariante"];
$objeto = new Aniversario();
$linha = $objeto->consultar($id_aniversariantes);
?>
<form action="" method="post">
    <fieldset>
        <legend>Cadastre</legend>
        <label>Nome do Aniversariante:<input maxlength="50" type="text" name="nome_niver" value="<?= $linha["nome_niver"] ?>" required></label>
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
        <label>Descrição:<input maxlength="255" type="text" name="descricao_niver" value="<?= $linha["descricao_niver"] ?>" required></label>
        <label>Data:<input type="Date" name="data_niver" value="<?= $linha["data_niver"] ?>" required></label>
    </fieldset>
    <button type="submit">Cadastrar</button>
</form>
<?php
if ($_POST) {
    $objeto = new Aniversario();
    $objeto->alterar($_POST);
    echo "<script>alert('Aniversariante alterado com sucesso!')</script>";
    echo "<script>location.href='index.php?arquivo=aniversariantes/listar.php';</script>";
}
?>
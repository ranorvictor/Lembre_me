<?php
include "classes/locais.php";
$id_local = $_GET["id_local"];
$objeto = new Locais();
$linha = $objeto->consultar($id_local);
?>
<form action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Alterar Dados</legend>
        <label>Nome do Local:<input maxlength="45" type="text" name="nome_local" placeholder="" value="<?= $linha["nome_local"] ?>" required></label>
        <label>Rua:<input maxlength="45" type="text" name="rua" value="<?= $linha["rua"] ?>" required></label>
        <label>Número:<input maxlength="45" type="text" name="numero" value="<?= $linha["numero"] ?>" required></label>
        <label>Complemento:<input maxlength="45" type="text" name="complemento" value="<?= $linha["complemento"] ?>" required></label>
        <label>Bairro:<input maxlength="45" type="text" name="bairro" value="<?= $linha["bairro"] ?>" required></label>
    </fieldset>
    <button type="submit">Alterar</button>
</form>
<?php
if ($_POST){
    $objeto = new Locais();
    $objeto->alterar($_POST);
    echo "<script>alert('Local alterado com sucesso!')</script>";
    echo "<script>location.href='index.php';</script>";
}
?>
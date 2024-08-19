<?php
include "classes/categoria.php";
$id_categoria = $_GET["id_categoria"];
$objeto = new Categoria();
$linha = $objeto->consultar($id_categoria);
?>
<form action="" method="post">
    <fieldset>
        <legend>Alterar categoria</legend>
        <label>Nome da Categoria:<input maxlength="45" type="text" name="categoria" value="<?=$linha["categoria"]?>" required></label>
    </fieldset>
    <button type="submit">Cadastrar</button>
</form>
<?php
if ($_POST) {
    $objeto = new Categoria();
    $objeto->alterar($_POST);
    echo "<script>alert('categoria alterado com sucesso!')</script>";
    echo "<script>location.href='index.php';</script>";
}
?>
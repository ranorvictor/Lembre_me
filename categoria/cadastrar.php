<form action="" method="post">
    <fieldset>
        <legend>Cadastre uma categoria!</legend>
        <label>Nome da Categoria:<input maxlength="45" type="text" name="categoria" required></label>
    </fieldset>
    <button type="submit">Cadastrar</button>
</form>
<?php
include "classes/categoria.php";
if ($_POST) {
    if ($_POST["categoria"] != ""){
        $objeto = new Categoria();
        $objeto->cadastrar($_POST);
        echo "<script>alert('cadastro realizado com sucesso!')</script>";
        echo "<script>location.href='index.php?arquivo=categoria/listar.php';</script>";
    } else {
        echo "<script>alert('Insira um dado válido!');</script>";
    }
}
?>
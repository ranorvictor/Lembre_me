<form action="" method="post">
    <fieldset>
        <legend>Cadastre</legend>
        <label>Nome do Local:<input maxlength="45" type="text" name="nome_local" required></label>
        <label>Rua:<input maxlength="45" type="text" name="rua" required></label>
        <label>Número:<input maxlength="45" type="text" name="numero" required></label>
        <label>Complemento:<input maxlength="45" type="text" name="complemento" required></label>
        <label>Bairro:<input maxlength="45" type="text" name="bairro" required></label>
    </fieldset>
    <button type="submit">Cadastrar</button>
</form>
<?php
include "classes/locais.php";
if ($_POST) {
    if($_POST["nome_local"] != "" && $_POST["rua"] != "" && $_POST["numero"] != "" && $_POST["complemento"] != "" && $_POST["bairro"] != ""){
        $objeto = new Locais();
        $objeto->cadastrar($_POST);
        echo "<script>alert('cadastro realizado com sucesso!')</script>";
        echo "<script>location.href='index.php?arquivo=locais/listar.php';</script>";
    }else {
        echo "<script>alert('Insira um dado válido!');</script>";
    }
}
?>
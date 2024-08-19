<form action="" method="post">
    <fieldset>
        <legend>Cadastre</legend>
        <label>Nome do Aniversariante:<input maxlength="50" type="text" name="nome_niver" required></label>
        <label>
            Local: <select name="id_local">
                <option value="">selecione</option>
                <?php
                include "classes/locais.php";
                $objeto = new Locais();
                $resultado = $objeto->listar($_SESSION["id_usuario"]);
                foreach ($resultado as $linha) {
                    echo "<option value='{$linha["id_local"]}'>{$linha["nome_local"]}</option>";
                }
                ?>
            </select>
        </label>
        <label>Descrição:<input maxlength="255" type="text" name="descricao_niver" required></label>
        <label>Data:<input type="Date" name="data_niver" required></label>
    </fieldset>
    <button type="submit">Cadastrar</button>
</form>
<?php
include "classes/aniversario.php";
if ($_POST) {
    if($_POST["nome_niver"] != "" && $_POST["id_local"] != "" && $_POST["descricao_niver"] != "" && $_POST["data_niver"] != ""){
        $objeto = new Aniversario();
        $objeto->cadastrar($_POST);
        echo "<script>alert('cadastro realizado com sucesso!')</script>";
        echo "<script>location.href='index.php?arquivo=aniversariantes/listar.php';</script>";
    } else {
        echo "<script>alert('Insira um dado válido!');</script>";
    }
}
?>
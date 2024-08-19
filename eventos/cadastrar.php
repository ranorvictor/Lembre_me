<form action="" method="post">
    <fieldset>
        <legend>Cadastre</legend>
        <label>Título:<input maxlength="50" type="text" name="titulo_evento" required></label>
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
        <label>Descrição:<input maxlength="255" type="text" name="descricao_evento" required></label>
        <label>Data:<input type="Date" name="data_evento" required></label>
    </fieldset>
    <button type="submit">Cadastrar</button>
</form>
<?php
include "classes/eventos.php";
if ($_POST) {
    if($_POST["titulo_evento"] != "" && $_POST["id_local"] != "" && $_POST["descricao_evento"] != "" && $_POST["data_evento"] != ""){
        $objeto = new Eventos();
        $objeto->cadastrar($_POST);
        echo "<script>alert('cadastro realizado com sucesso!')</script>";
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "<script>alert('Insira um dado válido!');</script>";
    }
}
?>
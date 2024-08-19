<form action="" method="post">
    <fieldset>
        <label><input maxlength="45" type="text" name="nome" placeholder="Nome" required></label>
        <label><input maxlength="45" type="email" name="e_mail" placeholder="E-mail" required></label>
        <label><input maxlength="45" type="text" name="usuario" placeholder="Usuário" required></label>
        <label><input maxlength="45" type="password" name="senha" placeholder="Senha" required></label>
        <label>Data de Nascimento: <input type="date" name="data_nascimento" required></label>
    </fieldset>
    <button type="submit">Cadastrar</button>
</form>
<?php
include "classes/usuario.php";
if ($_POST) {
    if ($_POST["nome"] != "" && $_POST["e_mail"] != "" && $_POST["usuario"] != "" && $_POST["senha"] != "") {
        $objeto = new Usuario();
        $objeto->cadastrar($_POST);
        echo "<script>alert('cadastro realizado com sucesso!')</script>";
        echo "<script>location.href='index.php;</script>";
    } else {
        echo "<script>alert('Insira um dado válido!');</script>";
    }
}
?>
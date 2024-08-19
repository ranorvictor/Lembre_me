<form action="" method="post">
    <fieldset>
        <label>
            <input type="text" name="usuario" placeholder="Usuário"><br>
        </label>
        <label>
            <input type="password" name="senha" placeholder="Senha"><br>
        </label>
    </fieldset>
    <button type="submit">Entrar</button>
</form>
<?php
if ($_POST) {
    $log = new Login();
    $resultado = $log->autenticar($_POST["usuario"], $_POST["senha"]);
    if ($resultado) {
        $_SESSION["id_usuario"] = $resultado["id_usuario"];
        $_SESSION["nome"] = $resultado["nome"];
        $_SESSION["e_mail"] = $resultado["e_mail"];
        $_SESSION["usuario"] = $resultado["usuario"];
        $_SESSION["data_nascimento"] = $resultado["data_nascimento"];
        echo "<script>location.href='index.php?arquivo=eventos/listar.php';</script>";
    } else {
        echo "Usuário e/ou senha inválidos!";
    }
}
?>
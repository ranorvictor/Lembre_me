<?php
session_start();
include_once "classes/login.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lembre me!</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="quill/quill.snow.css" rel="stylesheet">
    <script src="quill/quill.js"></script>
    <script src="quill/image-resize.min.js"></script>
    <link rel="shortcut icon" href="fotos/icon.png" type="image/x-icon">
</head>

<body>
    <?php
    if (Login::estaLogado()) {
        ?>
        <h1><?php
            if (is_file("fotos/" . $_SESSION["id_usuario"] . ".png") == "true") {
                echo "<img src='fotos/{$_SESSION['id_usuario']}.png'>";
            } else {
                echo "<img src='fotos/avatar.png'>";
            }
            ?>
            <p>Olá <?= $_SESSION["nome"] ?>! Seja Bem vindo ao </p>
            <div>Lembre-me!</div>
        </h1>
        <div id='corp'>
            <div id='cab'>
                <a href="index.php?arquivo=post/listar.php">Posts</a>
                <a href="index.php?arquivo=eventos/listar.php">Eventos</a>
                <a href="index.php?arquivo=locais/listar.php">Locais</a>
                <a href="index.php?arquivo=aniversariantes/listar.php">Aniversariantes!</a>
                <a href="index.php?arquivo=usuario/alterar.php">Configurações</a>
                <a href="index.php?arquivo=login/sair.php">Sair</a>
            </div>
            <?php
            $arquivo = $_GET["arquivo"] ?? "eventos/listar.php";
            include "$arquivo";
            ?>
        </div>
    <?php
} else {
    ?>
        <h1> Lembre-me</h1>
        <div id="login">
            <a id="ent" href="index.php?arquivo=usuario/cadastrar.php">Cadastre-se</a>
            <a id="ent" href="index.php?arquivo=login/login.php">Entrar</a>
            <?php
            $arquivo = $_GET["arquivo"] ?? "login/login.php";
            include "$arquivo";
            ?>
        </div>
    <?php
}
?>
</body>

</html>
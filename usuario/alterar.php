<?php
include "classes/usuario.php";
$id_usuario = $_SESSION["id_usuario"];
$objeto = new Usuario();
$linha = $objeto->consultar($id_usuario);
?>
<form action="" method="post" enctype="multipart/form-data">
    <?php
    if(is_file("fotos/".$id_usuario.".png")=="true"){
        echo "<div><p>Foto atual:</p><img src='fotos/$id_usuario.png'></div>";
    }else{
        echo "<div><p>Foto atual:</p><img src='fotos/avatar.png'></div>";
    }
    ?>
    <fieldset>
        <legend>Alterar Dados</legend>
        <label>Nome:<input maxlength="45" type="text" name="nome" value="<?= $linha["nome"] ?>" required></label>
        <label>E-mail:<input maxlength="45" type="email" name="e_mail" value="<?= $linha["e_mail"] ?>" required></label>
        <label>Usuário:<input maxlength="45" type="text" name="usuario" value="<?= $linha["usuario"] ?>" required></label>
        <label>Senha:<input type="password" name="senha"></label>
        <label>Confirmar a senha:<input type="password" name="senha2"></label>
        <label>Data de Nascimento:<input type="date" name="data_nascimento" value="<?= $linha["data_nascimento"] ?>" required></label>
        <label>Alterar foto do Perfil: <input type="File" name="foto" ></label>
    </fieldset>
    <button type="submit">Alterar</button>
</form>
<?php
if ($_POST) {
    if($_FILES["foto"]["error"]==0){
        $imagem = new Imagick($_FILES["foto"]["tmp_name"]);
        $imagem->resizeImage(200,200, Imagick::FILTER_LANCZOS, 1);
        $imagem->writeImage("fotos/".$linha["id_usuario"].".png");
        $imagem->clear();
    }
    $objeto = new Usuario();
    $objeto->alterar($_POST);
    echo "<script>location.href='index.php?arquivo=usuario/alterar.php';</script>";
}
?>
<?php
include "classes/post.php";
$id_post = $_GET["id_post"];
$objeto = new Post();
$linha = $objeto->consultar($id_post);
?>
<form action="" method="post" onsubmit="return enviar()">
    <fieldset>
        <legend>Cadastre</legend>
        <label>Título do Post: <input maxlength="45" type="text" value="<?=$linha["titulo_post"]?>" name="titulo_post" required></label>
        <label>
            Categoria: <select name="id_categoria">
                <option value="<?=$linha["id_categoria"]?>"><?=$linha["categoria"]?></option>
                <?php
                include "classes/categoria.php";
                $objeto = new Categoria();
                $resultado = $objeto->listar($_SESSION["id_usuario"]);
                foreach ($resultado as $linha1) {
                    echo "<option value='{$linha1["id_categoria"]}'>{$linha1["categoria"]}</option>";
                }
                ?>
            </select>
        </label>
        <label>
      <div id="barradeferramentas">
        <span class="ql-formats">
          <select class="ql-font"></select>
          <select class="ql-size"></select>
        </span>
        <span class="ql-formats">
          <button class="ql-bold"></button>
          <button class="ql-italic"></button>
          <button class="ql-underline"></button>
          <button class="ql-strike"></button>
        </span>
        <span class="ql-formats">
          <select class="ql-color"></select>
          <select class="ql-background"></select>
        </span>
        <span class="ql-formats">
          <button class="ql-script" value="sub"></button>
          <button class="ql-script" value="super"></button>
        </span>
        <span class="ql-formats">
          <button class="ql-header" value="1"></button>
          <button class="ql-header" value="2"></button>
          <button class="ql-blockquote"></button>
          <button class="ql-code-block"></button>
        </span>
        <span class="ql-formats">
          <button class="ql-list" value="ordered"></button>
          <button class="ql-list" value="bullet"></button>
          <button class="ql-indent" value="-1"></button>
          <button class="ql-indent" value="+1"></button>
        </span>
        <span class="ql-formats">
          <button class="ql-direction" value="rtl"></button>
          <select class="ql-align"></select>
        </span>
        <span class="ql-formats">
          <button class="ql-link"></button>
          <button class="ql-image"></button>
          <button class="ql-video"></button>
        </span>
        <span class="ql-formats">
          <button class="ql-clean"></button>
        </span>
      </div>
      <div id="editor"><?=$linha["conteudo"]?></div>
      <br><input type="hidden" id="campo" name="conteudo">
    </label>
    <script>
    var quill = new Quill('#editor', {
        modules: {
        imageResize: { displaySize: true },
        toolbar: '#barradeferramentas'
        },
        placeholder: 'Conteúdo aqui...',
        theme: 'snow'
    });
    function enviar(){
        let campo = document.querySelector("#campo");
        campo.value = document.querySelector(".ql-editor").innerHTML;
        return true;
    }
    </script>
    </fieldset>
    <button type="submit">Alterar</button>
    <button type="reset">Apagar tudo!</button>
</form>
<?php
include_once "classes/post.php";
if ($_POST) {
    if ($_POST["titulo_post"] != "" && $_POST["id_categoria"] != "" && $_POST["conteudo"] != "") {
        $objeto = new Post();
        $objeto->alterar($_POST);
        echo "<script>alert('Post alterado com sucesso!')</script>";
        echo "<script>location.href='index.php?arquivo=post/listar.php';</script>";
    } else {
        echo "<script>alert('Insira um dado válido!');</script>";
    }
}
?>
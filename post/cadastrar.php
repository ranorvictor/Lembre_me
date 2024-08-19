<form action="" method="post" onsubmit="return enviar()">
    <fieldset>
        <legend>Cadastre</legend>
        <label>Título do Post: <input maxlength="45" type="text" name="titulo_post" required></label>
        <label>
            Categoria: <select name="id_categoria">
                <option value="">selecione</option>
                <?php
                include "classes/categoria.php";
                $objeto = new Categoria();
                $resultado = $objeto->listar($_SESSION["id_usuario"]);
                foreach ($resultado as $linha) {
                    echo "<option value='{$linha["id_categoria"]}'>{$linha["categoria"]}</option>";
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
      <div id="editor"></div>
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
    <button type="submit">Cadastrar</button>
    <button type="reset">Apagar tudo!</button>
</form>
<?php
include "classes/post.php";
if ($_POST) {
    if ($_POST["titulo_post"] != "" && $_POST["id_categoria"] != "" && $_POST["conteudo"] != "") {
        $objeto = new Post();
        $objeto->cadastrar($_POST);
        echo "<script>alert('Post cadastrado com sucesso!')</script>";
        echo "<script>location.href='index.php?arquivo=post/listar.php';</script>";
    } else {
        echo "<script>alert('Insira um dado válido!');</script>";
    }
}
?>
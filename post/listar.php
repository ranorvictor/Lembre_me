<a href="index.php?arquivo=post/cadastrar.php">Criar post</a>
<a href="index.php?arquivo=categoria/listar.php">Categorias</a>
<a href="index.php?arquivo=post/filtrar.php">Filtrar Posts</a>
<?php
include "classes/post.php";
$objeto = new Post();
$resultado = $objeto->listar($_GET["pagina"] ?? 1);
$valor = 0;
if ($resultado) {
    foreach ($resultado as $linha) {
        echo "<div id='post'>";
        echo "<a href='index.php?arquivo=post/excluir.php&id_post={$linha["id_post"]}'>X</a>";
        echo "<a href='index.php?arquivo=post/alterar.php&id_post={$linha["id_post"]}'><img src='fotos/alterar.png'></a>";
        echo "<h2>{$linha['titulo_post']}</h2>{$linha['conteudo']}<p>{$linha['categoria']}</p>";
        echo "</div>";
    }
} else {
    echo "<p>Não há posts cadastrados!</p>";
}
if ($objeto->qtd_paginas > 1) {
    for ($i = 1; $i <= $objeto->qtd_paginas; $i++) {
        if(isset($_GET["filtro"])){
            echo "<a href='index.php?arquivo=post/listar.php&pagina=$i&filtro={$_GET['filtro']}'>$i</a>";
        }else{
            echo "<a href='index.php?arquivo=post/listar.php&pagina=$i'>$i</a>";
        }
    }
}
?>
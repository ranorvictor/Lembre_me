<?php
include_once "conexao.php";
class Login extends Conexao{
    public function __construct(){
        $this->conectar();
    }
    public function autenticar($usuario, $senha){
        $consulta = $this->conexao->prepare("SELECT * FROM usuario WHERE usuario=:usuario AND senha=:senha");
        $consulta->bindValue(":usuario", $usuario);
        $consulta->bindValue(":senha", md5($senha));
        $consulta->execute();
        return $consulta->fetch();
    }
    public static function estaLogado(){
        return isset($_SESSION["id_usuario"]);
    }
    public static function deslogar(){
        session_destroy();
        header("Location:index.php");
    }
}
?>
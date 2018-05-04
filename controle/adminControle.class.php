<?php
include_once "funcao.php";
class adminControle
{
    function admin(){
        $usuDAO = new usuarioDAO();
        $retorno = $usuDAO->buscarTodos();
        require_once "visao/usuarios_admin.php";
    }

    //USUARIOS
    function usuarios(){
        $usuDAO = new usuarioDAO();
        $retorno = $usuDAO->buscarTodos();
        require_once "visao/usuarios_admin.php";
    }
    function novoUsuario(){
        $id="";
        if($_POST)
        {
            $usuario = new usuario(null, $_POST["nome"],$_POST["email"] , $_POST["senha"], $_POST["tipo"]);
            $usuarioDAO = new usuarioDAO();
            $usuarioDAO->registrar($usuario);
            echo "<script>window.location.href='index.php?controle=adminControle&metodo=usuarios';</script>";
        }
        require_once "visao/usuario_admin.php";
    }
    function alterarUsuario(){
        $id="";
        if($_GET)
        {
            $id = $_GET["id"];
            $usuario = new usuario($id);
            $usuDAO = new usuarioDAO();
            $retorno = $usuDAO->buscarUm($usuario);
            require_once "visao/usuario_admin.php";
        }
        if($_POST)
        {
           $usuario = new usuario($_POST["id"], null,null,null,$_POST["tipo"]);
            $usuarioDAO = new usuarioDAO();
            $usuarioDAO->alterar($usuario);
            echo "<script>window.location.href='index.php?controle=adminControle&metodo=usuarios';</script>";
        }
    }

    //PRODUTOS
    function produtos(){
        $prodDAO = new produtoDAO();
        $retorno = $prodDAO->buscarTodos();
        require_once "visao/produtos_admin.php";
    }
    function alterarProduto(){
        $id="";
        if($_GET)
        {
            $id = $_GET["id"];
            $produto = new produto($id);
            $prodDAO = new produtoDAO();
            $retorno = $prodDAO->buscarUm($produto);
            require_once "visao/produto_admin.php";
        }
        if($_POST)
        {
            if(!empty($_FILES["foto"]["name"])) {
                $foto = $_FILES["foto"];
                $antiga =  $_POST["imagem"];
                unlink($antiga);
                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                // Caminho de onde ficará a imagem
                $caminho_imagem = "fotos/" . $nome_imagem;
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
                $produto = new produto($_POST["id"], $_POST["nome"],$_POST["preco"],$_POST["disponivel"], $caminho_imagem);
                $prodDAO = new produtoDAO();
                $prodDAO->alterarFoto($produto);
            } else{
                $produto = new produto($_POST["id"], $_POST["nome"],$_POST["preco"],$_POST["disponivel"]);
                $prodDAO = new produtoDAO();
                $prodDAO->alterar($produto);
            }

            echo "<script>window.location.href='index.php?controle=adminControle&metodo=produtos';</script>";
        }
    }

    function adicionarProduto(){
        $id="";
        if($_POST)
        {
            if(!empty($_FILES["foto"]["name"])) {
                $foto = $_FILES["foto"];
                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                // Caminho de onde ficará a imagem
                $caminho_imagem = "fotos/" . $nome_imagem;
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
                $produto = new produto(null, $_POST["nome"],$_POST["preco"],$_POST["disponivel"], $caminho_imagem);
                $prodDAO = new produtoDAO();
                $prodDAO->adicionar($produto);
                echo "<script>window.location.href='index.php?controle=adminControle&metodo=produtos';</script>";
            }

        }
        require_once "visao/produto_admin.php";
    }
    function localizacao(){
        if($_POST)
        {
            $localizacao = new localizacao(1, $_POST["endereco"], $_POST["latitude"], $_POST["longitude"]);
            $localizacaoDAO = new localizacaoDAO();
            $localizacaoDAO->alterar($localizacao);
            echo "<script>window.location.href='index.php?controle=adminControle&metodo=localizacao';</script>";
        }
        $localizacaoDAO = new localizacaoDAO();
        $retorno = $localizacaoDAO->buscarUma();
        require_once "visao/local_admin.php";
    }
    function pedidos(){
        $vendaDAO = new vendaDAO();
        $retorno = $vendaDAO->buscarVendas();
        require_once "visao/pedidos_admin.php";
    }
    function exibePedido(){
        $id="";
        if($_GET)
        {
            $id = $_GET["id"];
            $venda = new venda($id);
            $vendaDAO = new vendaDAO();
            $retorno = $vendaDAO->buscarUma($venda);
            $localizacaoDAO = new localizacaoDAO();
            $retornoLOC = $localizacaoDAO->buscarUma();
            require_once "visao/pedido_admin.php";
        }
    }
}
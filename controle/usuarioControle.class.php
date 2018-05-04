<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 11/12/2017
 * Time: 20:32
 */
include_once "funcao.php";
class usuarioControle
{
    function cliente(){
        $prodDAO = new produtoDAO();
        $retorno = $prodDAO->buscarDisponivel();
        require_once "visao/paginaInicial.php";
    }
    function finalizar(){
        $id="";
        if($_GET)
        {
            $idprod = $_GET["id"];
            $produto = new produto($idprod);
            $produtoDAO = new produtoDAO();
            $retorno = $produtoDAO->buscarUm($produto);
            $localizacaoDAO = new localizacaoDAO();
            $retornoLOC = $localizacaoDAO->buscarUma();
        }
        if($_POST)
        {
            $venda = new venda(null,$_POST["valor"], $_POST["latitude"], $_POST["longitude"], $_POST["usuario"], $_POST["endereco"], $_POST["produto"]);
            $vendaDAO = new vendaDAO();
            $vendaDAO->novaVenda($venda);
            echo "<script>alert('Compra realizada com sucesso');window.location.href='index.php?controle=usuarioControle&metodo=cliente';</script>";
        }

        require_once "visao/finalizar.php";
    }
    function pedidos(){
        $id="";
        if($_GET)
        {
            $id_usu = $_GET["id"];
            $venda = new venda(null,null,null,null,$id_usu);
            $vendaDAO = new vendaDAO();
            $retorno = $vendaDAO->buscarUsu($venda);
        }
        require_once "visao/pedidos_cliente.php";
    }
}
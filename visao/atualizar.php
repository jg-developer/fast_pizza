<?php
require_once "auto.php";
//excluindo produtos do carrinho
if($_GET)
{
    if(!isset($_SESSION))
        session_start();
    //apagando a linha, recebida via GET,  do carrinho
    unset($_SESSION["carrinho"][$_GET["linha"]]);
    include "carrinho.php";
}
//alterando a quantidade que será comprada(AJAX)
if($_POST)
{
    $qtde = $_POST["q"];
    if($qtde > 0)
    {
        $linha = $_POST["lin"];
        $id = $_POST["id"];
        //verificando se a sessão não estartada
        if(!isset($_SESSION))
            session_start();
        //verificar se há no banco produtos em quantidade para a venda
        $prod = new produto($id);
        $prodDAO = new produtoDAO();
        $ret = $prodDAO->buscarUm($prod);
        if(count($ret)>0 && $ret[0]->quant >= $qtde)
        {
            $_SESSION["carrinho"][$linha]["qtde"] = $qtde;
        }

    }
}
?>
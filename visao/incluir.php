<?php
if (!$id == ""){
    $existe = false;
    $lin = -1;
    if(!isset($_SESSION))
    {
        session_start();
    }
    if(isset($_SESSION["carrinho"]))
    {
        foreach($_SESSION["carrinho"] as $lin=>$valor)
        {
            if($valor["codigo"] == $id)
                $existe = true;
        }
    }
    if(!$existe)
    {
        $_SESSION["carrinho"][$lin+1]["codigo"]  = $id;
        $_SESSION["carrinho"][$lin+1]["nome"]  = $retorno[0]->nome;
        $_SESSION["carrinho"][$lin+1]["preco"]  = $retorno[0]->preco;
        $_SESSION["carrinho"][$lin+1]["imagem"]  = $retorno[0]->imagem;
        $_SESSION["carrinho"][$lin+1]["qtde"]  = 1;
    }
}

?>
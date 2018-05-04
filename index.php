<?php
	if ($_GET)
    {
        //recebeu par�metros
        $controle = $_GET['controle'];
        $metodo = $_GET["metodo"];
        require_once "controle/" . $controle. ".class.php";
        $obj = new $controle();
        $obj->$metodo();
    }
    else
    {
        //posi��o inicial
        require_once "controle/inicio.class.php";
        $ini = new inicio();
        $ini->inicio();
    }
?>
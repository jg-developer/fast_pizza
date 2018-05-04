<?php
include_once "funcao.php";
class loginControle
{
    function login(){
        if($_POST)
        {
            $usuario = new usuario(null, null, $_POST["email"], $_POST["senha"]);
            $usuDAO = new usuarioDAO();
            $retorno = $usuDAO->autenticar($usuario);
            if(count($retorno) > 0)
            {
                if(!isset($_SESSION)) {
                    session_start();
                    $_SESSION["tipo"] = $retorno[0]->id_tipo;
                    $_SESSION["idusu"] = $retorno[0]->id_usu;
                    $_SESSION["usuario"] = $retorno[0]->nome;
                    $_SESSION["logado"] = "S";
                }
                if($_SESSION["tipo"] == "1"){
                    echo "<script>window.location.href='index.php?controle=adminControle&metodo=admin';</script>";
                } else if ($_SESSION["tipo"] == "2"){
                    echo "<script>window.location.href='index.php?controle=usuarioControle&metodo=cliente';</script>";
                }
            }
            else
            {
                echo "<script>alert('email/senha não conferem')</script>";
            }
        }
        require_once "visao/login.php";
    }
    function registrar(){
        if($_POST)
        {
            $usuario = new usuario(null, $_POST["nome"], $_POST["email"], $_POST["senha"], "2");
            $usuDAO = new usuarioDAO();
            $usuDAO->registrar($usuario);
            echo "<script>alert('Cadastro realizado com sucesso, faça o login para continuar');window.location.href='index.php?controle=inicio&metodo=inicio';</script>";
        }
        require_once "visao/register.php";
    }
    function autenticarLogin(){

    }
}
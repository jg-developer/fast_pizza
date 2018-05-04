<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 11/12/2017
 * Time: 20:38
 */

class usuarioDAO extends conexao
{
    function __construct()
    {
        parent:: __construct();
    }

    function autenticar($usuario)
    {
        $sql = "SELECT * FROM usuarios where email = ? and senha = ?";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $usuario->getEmail());
            $stmt->bindValue(2, $usuario->getSenha());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao autenticar");
            }
            else
            {
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            }
        }
        catch (PDOException $e)
        {
            die( $e->getMessage());
        }
    }
    function registrar($usuario){
        $sql = "INSERT INTO usuarios (nome, email, senha, id_tipo) VALUE (?, ?, ?, ?)";

        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $usuario->getNome());
            $stmt->bindValue(2, $usuario->getEmail());
            $stmt->bindValue(3, $usuario->getSenha());
            $stmt->bindValue(4, $usuario->getTipo());
            $ret =$stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao realizar cadastro");
            }
        }
        catch (PDOException $e)
        {
            die ($e->getMessage());
        }
    }

    function buscarTodos()
    {
        $sql = "SELECT u.id_usu 'id_usu', t.id_tipo 'id_tipo', t.descricao 'tipo',u.nome 'nome', u.email 'email', u.senha 'senha' FROM usuarios u INNER JOIN tipo_usuario t ON(u.id_tipo = t.id_tipo)";
        try
        {
            //preparar a frase sql para ser executada
            $f = $this->db->prepare($sql);
            //executar a frase no banco de dados
            $ret = $f->execute();
            //fecha a conexão
            $this->db = null;
            if(!$ret)
            {
                die ("Erro ao buscar todos os usuários");
            }
            else
            {
                $retorno = $f->fetchAll(PDO::FETCH_OBJ);
                return $retorno;
            }
        }
        catch ( Exception $e )
        {
            die ($e->getMessage());
        }
    }
    function buscarUm($usuario)
    {
        $sql = "SELECT * FROM usuarios where id_usu = ?";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $usuario->getId());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao buscar usuario");
            }
            else
            {
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            }
        }
        catch (PDOException $e)
        {
            die( $e->getMessage());
        }
    }
    function alterar($usuario)
    {

        $sql = "UPDATE usuarios SET id_tipo = ? WHERE id_usu = ?";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $usuario->getTipo());
            $stmt->bindValue(2, $usuario->getId());
            $ret = $stmt->execute();
            if(!$ret)
            {
                die("Erro ao alterar usuario");
            }

            $this->db = null;
        }
        catch (PDOException $e)
        {
            die( $e->getMessage());
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 13/12/2017
 * Time: 15:40
 */

class vendaDAO extends conexao
{
    function __construct()
    {
        parent:: __construct();
    }
    function novaVenda($venda){
        $sql = "INSERT INTO nfv (valor, latitude, longitude, id_usu, endereco, id_prod) VALUE (?, ?, ?, ?, ?, ?)";

        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $venda->getValor());
            $stmt->bindValue(2, $venda->getLatitude());
            $stmt->bindValue(3, $venda->getLongitude());
            $stmt->bindValue(4, $venda->getUsuario());
            $stmt->bindValue(5, $venda->getEndereco());
            $stmt->bindValue(6, $venda->getProduto());
            $ret =$stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao realizar venda");
            }
        }
        catch (PDOException $e)
        {
            die ($e->getMessage());
        }
    }
    function buscarVendas()
    {
        $sql = "SELECT v.id_nfv 'id_nfv', c.nome 'cliente', p.nome 'produto' FROM nfv v INNER JOIN usuarios c ON(v.id_usu = c.id_usu) INNER JOIN produtos p ON(v.id_prod = p.id_prod)";
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
                die ("Erro ao buscar todas as vendas");
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
    function buscarUma($venda)
    {
        $sql = "SELECT v.id_nfv 'id_nfv', c.nome 'cliente', p.nome 'produto', v.latitude 'latitude', v.longitude 'longitude' FROM nfv v INNER JOIN usuarios c ON(v.id_usu = c.id_usu) INNER JOIN produtos p ON(v.id_prod = p.id_prod) WHERE id_nfv = ?";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $venda->getId());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao buscar pedido");
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
    function buscarUsu($venda)
    {
        $sql = "SELECT v.id_usu 'id_usu', v.valor 'preco', c.nome 'cliente', p.nome 'produto' FROM nfv v INNER JOIN usuarios c ON(v.id_usu = c.id_usu) INNER JOIN produtos p ON(v.id_prod = p.id_prod) WHERE v.id_usu = ?";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $venda->getUsuario());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao buscar os pedidos");
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
}
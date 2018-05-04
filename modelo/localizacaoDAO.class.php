<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 13/12/2017
 * Time: 12:51
 */

class localizacaoDAO extends conexao
{
    function __construct()
    {
        parent:: __construct();
    }
    function buscarUma()
    {
        $sql = "SELECT * FROM localizacao where id_loc = 1";
        try
        {
            $stmt = $this->db->prepare($sql);
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao buscar localizacao");
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
    function alterar($localizacao)
    {

        $sql = "UPDATE localizacao SET endereco = ?, latitude = ? , longitude = ? WHERE id_loc = ?";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $localizacao->getEndereco());
            $stmt->bindValue(2, $localizacao->getLatitude());
            $stmt->bindValue(3, $localizacao->getLongitude());
            $stmt->bindValue(4, $localizacao->getId());
            $ret = $stmt->execute();
            if(!$ret)
            {
                die("Erro ao alterar a localização");
            }

            $this->db = null;
        }
        catch (PDOException $e)
        {
            die( $e->getMessage());
        }
    }
}
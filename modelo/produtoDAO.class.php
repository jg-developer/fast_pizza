<?php
class produtoDAO extends conexao
{
    function __construct()
    {
        parent:: __construct();
    }
    function buscarTodos()
    {
        $sql = "SELECT p.id_prod 'id_prod', p.nome 'nome', p.preco 'preco', p.disponivel 'disponivel', p.imagem 'imagem' FROM produtos p";
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
                die ("Erro ao buscar todos os produtos");
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
    function buscarUm($produto)
    {
        $sql = "SELECT * FROM produtos where id_prod = ?";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $produto->getId());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao buscar produto");
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
    function adicionar($produto){
        $sql = "INSERT INTO produtos (nome,preco,disponivel,imagem) VALUES(?,?,?,?)";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $produto->getNome());
            $stmt->bindValue(2, $produto->getPreco());
            $stmt->bindValue(3, $produto->getDisponivel());
            $stmt->bindValue(4, $produto->getImagem());
            $ret = $stmt->execute();
            if(!$ret)
            {
                die("Erro ao adicionar produto");
            }

            $this->db = null;
        }
        catch (PDOException $e)
        {
            die( $e->getMessage());
        }
    }
    function alterar($produto){
        $sql = "UPDATE produtos SET nome = ?, preco = ?, disponivel = ? WHERE id_prod = ?";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $produto->getNome());
            $stmt->bindValue(2, $produto->getPreco());
            $stmt->bindValue(3, $produto->getDisponivel());
            $stmt->bindValue(4, $produto->getId());
            $ret = $stmt->execute();
            if(!$ret)
            {
                die("Erro ao alterar produto");
            }

            $this->db = null;
        }
        catch (PDOException $e)
        {
            die( $e->getMessage());
        }
    }
    function alterarFoto($produto){
        $sql = "UPDATE produtos SET imagem = ? WHERE id_prod = ?";
        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $produto->getImagem());
            $stmt->bindValue(2, $produto->getId());
            $ret = $stmt->execute();
            if(!$ret)
            {
                die("Erro ao alterar foto");
            }

            $this->db = null;
        }
        catch (PDOException $e)
        {
            die( $e->getMessage());
        }
    }
    function buscarDisponivel()
    {
        $sql = "SELECT * FROM produtos WHERE disponivel = 'S'";
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
                die ("Erro ao buscar todos os produtos");
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
}
<?php

class produto
{
    private $id;
    private $nome;
    private $preco;
    private $disponivel;
    private $imagem;

    public function __construct($id=null, $nome=null, $preco=null, $disponivel=null, $imagem=null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->disponivel = $disponivel;
        $this->imagem = $imagem;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param null $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    /**
     * @return null
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param null $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }


    public function getDisponivel()
    {
        return $this->disponivel;
    }

    /**
     * @param null $disponivel
     */
    public function setDisponivel($disponivel)
    {
        $this->disponivel = $disponivel;
    }

    /**
     * @return null
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param null $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }
}
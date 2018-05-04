<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 11/12/2017
 * Time: 18:30
 */

class usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $tipo;

    /**
     * usuario constructor.
     * @param $id
     * @param $nome
     * @param $email
     * @param $senha
     * @param $tipo
     */
    public function __construct($id=null, $nome=null, $email=null, $senha=null, $tipo=null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->tipo = $tipo;
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

    /**
     * @return null
     */
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return null
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param null $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param null $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 11/12/2017
 * Time: 18:31
 */

class tipoUsuario
{
    private $id;
    private $descricao;


    public function __construct($id=null, $descricao=null)
    {
        $this->id = $id;
        $this->descricao = $descricao;
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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param null $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


}
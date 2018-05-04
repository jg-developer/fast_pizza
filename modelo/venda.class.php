<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 11/12/2017
 * Time: 18:35
 */

class venda
{
    private $id;
    private $valor;
    private $latitude;
    private $longitude;
    private $usuario;
    private $endereco;
    private $produto;


    public function __construct($id=null, $valor=null, $latitude=null, $longitude=null, $usuario=null, $endereco=null, $produto=null)
    {
        $this->id = $id;
        $this->valor = $valor;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->usuario = $usuario;
        $this->endereco = $endereco;
        $this->produto = $produto;
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
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param null $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param null $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param null $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return null
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param null $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return null
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param null $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return null
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * @param null $produto
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }


}
<?php

class localizacao
{
    private $id;
    private $endereco;
    private $latitude;
    private $longitude;

    /**
     * localizacao constructor.
     * @param $id
     * @param $endereco
     * @param $latitude
     * @param $longitude
     */
    public function __construct($id=null, $endereco=null, $latitude=null, $longitude=null)
    {
        $this->id = $id;
        $this->endereco = $endereco;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
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


}
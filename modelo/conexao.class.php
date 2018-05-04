<?php
abstract class conexao {
    protected $db;

    protected function __construct()
    {
        $dsn="mysql:host=localhost;dbname=fast_pizza";
        try
        {
            $this->db = new PDO($dsn, "root", "");
        }
        catch ( Exception $e )
        {
            die ($e->getMessage());
        }
    }
}
?>